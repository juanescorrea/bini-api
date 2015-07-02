<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLogin extends Model
{
    //
    protected $table = 'bini_users';
	protected $primaryKey = 'id';
	protected $fillable = ['name','email','login_name','password','picture_url','bio','fb_id','tw_id','social_network_flag'];
	protected $hidden = ['id','created_at','updated_at','password'];

    public function users(){
    	//return $this->hasMany('App\Vehicle');
    }
}
