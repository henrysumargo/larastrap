<?php
class Address extends Eloquent {
	
	/**
	 * The database table used by the model.
	 *
	 * @ string
	 */
	protected $table = 'singposts';

	protected $primaryKey = 'address_id';

	public $timestamps = false;

	public function search_address($param = array()) {
		$address = DB::table('singposts');

       // if(!empty($param['street'])) {
			$address->where('street', 'like', '%'.$param['search'].'%');
       // } elseif(!empty($param['post_code'])) {
			$address->orWhere('post_code', 'like', '%'.$param['search'].'%');
       // }
       //add order by

      $result = $address->limit(10)->get();
       
       return $result;
	}
}