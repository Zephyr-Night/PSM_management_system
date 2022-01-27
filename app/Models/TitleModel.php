<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TitleModel extends Model
{
    use HasFactory;
    protected $table = '_title';
    protected $fillable= [
        'field',
        'project_title',
        'project_description',
    ];
     protected $guarded = ['studentId','lectureId'];
    public $timestamps = false;

    public function lectureprofile()
    {
        return $this->belongsTo('App\Models\lectureprofileModel','lectureId','lectureId');
    }
    public function studentprofile()
    {
        return $this->belongsTo('App\Models\studentprofileModel','studentId','studentId');
    }

    //lecturer index title
    public function indextitle()
    {

        $getsession = session()->get('userprimarykey');

        $user = new lectureprofileModel();

        $user = $user::where('user_id',$getsession)->firstOrFail();

        $titlelist = TitleModel::Select()->where('lectureId',$user->lectureId)->get();

        return $titlelist;
    }

       //student title
       public function studenttitle()
       {
        $studenttitle = TitleModel::Select()->orWhereNull('studentId')->with('lectureprofile')->get();

        return $studenttitle;
       }



      //lecturer add title
    public function store($data)
    {

        $getsession = session()->get('userprimarykey');

        $user = new lectureprofileModel();

        $user = $user::where('user_id',$getsession)->firstOrFail();

        $addtitlefkvalue = $data->all();

        $addtitlefinal = new TitleModel($addtitlefkvalue);

        $user->title()->save($addtitlefinal);
    }

    //lecturer edit title
    public function changetitle($data)
    {
        $updatetitle = TitleModel::findOrFail($data);

        return $updatetitle;
    }

    public function updatetitle($data, $dataid)
    {
        $postupdate = TitleModel::whereid($dataid)->first();
        $postupdate->update($data->all());
    }

     //lecturer delete title
     public function deleteTitle($data)
     {
         $deleterequest = TitleModel::findOrFail($data);
         $deleterequest->delete();
     }

     //student book title
     public function Book( $dataid)
     {
        $postupdate = TitleModel::whereid($dataid)->first();

       $getsession = session()->get('userprimarykey');

       $user = new studentprofileModel();

       $user = $user::where('user_id',$getsession)->firstOrFail();

       $user->title()->save($postupdate);

     }

     //student view title
     public function viewtitle($data)
     {
         $updatetitle = TitleModel::findOrFail($data);

         return $updatetitle;
     }

}
