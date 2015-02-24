<?php namespace TaskManagement;
use TaskManagement\User;
use Illuminate\Database\Eloquent\Model;

class Task extends Model {

	protected $table = 'Tasks';

	protected $fillable = ['user_id' , 'content'];

	protected $guarded = ['id'];

	public static function getUserNameByUserId($id){
		return User::findOrFail($id)->nome;
	}


	public $timestamps = true;

}
