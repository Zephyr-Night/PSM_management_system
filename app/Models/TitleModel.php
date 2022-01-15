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


      //index
      public function indextitle()
      {

              $getsession = session()->get('userprimarykey');

              $user = new lectureprofileModel();

              $user = $user::where('user_id',$getsession)->firstOrFail();

              $titlelist = TitleModel::Select()->where('lectureId',$user->lectureId)->get();

              return $titlelist;
      }

       //index
       public function studenttitle()
       {

        $inventoryItem = TitleModel::Select()->where('studentId','like',null)->get();

        return $inventoryItem;
       }



      //store
    public function store($data)
    {

                $getsession = $data->session()->get('userprimarykey');

                $user = new lectureprofileModel();

                $user = $user::where('user_id',$getsession)->firstOrFail();

                $addtitlefkvalue = $data->all();

                $addtitlefinal = new TitleModel($addtitlefkvalue);

                $user->title()->save($addtitlefinal);
    }

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

     //delete
     public function deleteTitle($data)
     {
         $deleterequest = TitleModel::findOrFail($data);
         $deleterequest->delete();
     }




}
