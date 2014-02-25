	<?php
	
	class AccountController extends BaseController {
	/**
	* User Model
	* @var User
	*/
	protected $user;
	
	/**
	* Inject the models.
	* @param Post $post
	* @param User $user
	*/
	public function __construct(Post $post, User $user)
	{
		parent::__construct();
		
		$this->user = $user;
		
		$this->current_user = $this->user->currentUser();
	
	}
	
	/**
	 * Index
	 *
	 * @return View
	 */
	public function getIndex()
	{
		if($this->current_user->user_type == 2) {
			return Redirect::route('customer.profile');
		} elseif($this->current_user->user_type == 1) {
			return Redirect::route('admin.index');
		} else {
			return Redirect::route('/');
		}
	}
	
	/**
	 * Index
	 *
	 * @return View
	 */
	public function getCustomerProfile()
	{
		$current_user = $this->current_user;
		return View::make('customer/index', compact('current_user'));	
		
	}
	
	/**
	 * Landing Page / create account page
	 *
	 * @param  string  $slug
	 * @return Redirect
	 */
	public function getLogin()
	{
		return View::make('land/index');
	}
	
	/**
	* Attempt to do login
	*
	*/
	public function postLogin()
	{
		$input = array(
		    'email'    => Input::get( 'email' ), // May be the username too
		    'username' => Input::get( 'email' ), // May be the username too
		    'password' => Input::get( 'password' ),
		    'remember' => Input::get( 'remember' ),
		);
		
		// If you wish to only allow login from confirmed users, call logAttempt
		// with the second parameter as true.
		// logAttempt will check if the 'email' perhaps is the username.
		// Check that the user is confirmed.
		if ( Confide::logAttempt( $input, true ) )
		{
		    $r = Session::get('loginRedirect');
		    if (!empty($r))
		    {
		        Session::forget('loginRedirect');
		        return Redirect::to($r);
		    }
		    return Redirect::to('/');
		}
		else
		{
		    // Check if there was too many login attempts
		    if ( Confide::isThrottled( $input ) ) {
		        $err_msg = Lang::get('confide::confide.alerts.too_many_attempts');
		    } //remove activation for now
		    elseif ( $this->user->checkUserExists( $input ) 
		    	//&& ! $this->user->isConfirmed( $input ) 
		    	) {
		        $err_msg = Lang::get('confide::confide.alerts.not_confirmed');
		    } 
		    else {
		        $err_msg = Lang::get('confide::confide.alerts.wrong_credentials');
		    }
		
		    return Redirect::to('/login')
		        ->withInput(Input::except('password'))
		        ->with( 'error', $err_msg );
		}
	}
	
	/**
	 * Register
	 *
	 * @param  string  $slug
	 * @return Redirect
	 */
	public function register()
	{
		return View::make('land/register');
	}
	
	/**
	 * Register Process
	 *
	 * @param  string  $slug
	 * @return Redirect
	 */
	public function registerProcess()
	{	
		$this->user->username = Input::get( 'username' );
		$this->user->name = Input::get( 'name' );
		$this->user->email = Input::get( 'email' );        
		$this->user->name = Input::get( 'name' );
		$this->user->confirmed = 1;
		
		$password = Input::get( 'password' );
		$passwordConfirmation = Input::get( 'password_confirmation' );
	
		if(!empty($password)) {
		    if($password === $passwordConfirmation) {
		        $this->user->password = $password;
		        // The password confirmation will be removed from model
		        // before saving. This field will be used in Ardent's
		        // auto validation.
		        $this->user->password_confirmation = $passwordConfirmation;
		    } else {
		        // Redirect to the new user page
		        return Redirect::to('register')
		            ->withInput(Input::except('password','password_confirmation'))
		            ->with('error', array(Lang::get('admin/users/messages.password_does_not_match')));
		    }
		} else {
		    unset($this->user->password);
		    unset($this->user->password_confirmation);
		}
		
		// Save if valid. Password field will be hashed before save
		$this->user->save();
		
		if ( $this->user->id )
		{
		    // Redirect with success message, You may replace "Lang::get(..." for your custom message.
		    return Redirect::to('register2')
		        ->with( 'notice', Lang::get('user/user.user_account_created') );
		}
		else
		{
		    // Get validation errors (see Ardent package)
		    $error = $this->user->errors()->all();
		
		    return Redirect::to('register')
		        ->withInput(Input::except('password'))
		        ->with( 'error', $error );
		}
	}
	
	/**
	 * Register Address
	 *
	 * @param  string  $slug
	 * @return Redirect
	 */
	public function registerTwo()
	{
	
		return View::make('land/register2');
	}
	
	/**
	 * Register Process
	 *
	 * @param  string  $slug
	 * @return Redirect
	 */
	public function registerTwoProcess()
	{
		
	}
	
}
