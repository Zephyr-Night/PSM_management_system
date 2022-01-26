<?php

namespace app\Models;

use App\Models\inventoryitemModel;
use App\Models\studentprofileModel;
use App\Models\lectureprofileModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventoryusageModel extends Model
{
    use HasFactory;
    protected $table = 'inventoryusage';
    protected $fillable= [
        'itemId',
        'Startdate',
        'Enddate',
        'reason',
        'status'
    ];
     protected $guarded = ['studentId'];
    public $timestamps = false;

    //intentoryitem (itemid) is belong to model inventoryitemmodel
    public function inventoryitem()
    {
        return $this->belongsTo(inventoryitemModel::class,'itemId','itemId');
    }
      //studentprofile (studentId) is belong to model studentprofileModel
    public function studentprofile()
    {
        return $this->belongsTo('App\Models\studentprofileModel','studentId','studentId');
    }
    public function lectureprofile()
    {
        return $this->belongsTo('App\Models\lectureprofileModel','lectureId','lectureId');
    }

    //index
    public function indexmodel()
    {
            //retrive user Primary Key data by using session (get from LoginController)
            $getsession = session()->get('userprimarykey');

            //create new model instance studentprofileModel
            $user = new studentprofileModel();

            //find the first user_id data (foreign key) in db (table: studentprofile)
            $user = $user::where('user_id',$getsession)->firstOrFail();

            //get all inventoryUsage primary key for specific user
            //use 'with()' in order to access data from other table by using foreign key (itemId)
            //go to inventoryUsage function inventoryitem()
            //->where('status','LIKE','pending')->
            $inventorylist = inventoryUsageModel::Select()->where('studentId',$user->studentId)->with('inventoryitem')->with('lectureprofile')->get();

            return $inventorylist;
    }

    //create
    public function create()
    {

        //get list inventoryname and id if value not 0
        $inventoryItem = inventoryitemModel::Select()->where('quantity','!=',0)->get();

        return $inventoryItem;
    }

    //store
    public function store($data)
    {
                //retrive user Primary Key data by using session (get from LoginController)
                $getsession = $data->session()->get('userprimarykey');

                //create new model instance studentprofileModel
                $user = new studentprofileModel();

                //find the first user_id data (foreign key) in db (table: studentprofile)
                $user = $user::where('user_id',$getsession)->firstOrFail();

                //retieve all input data
                $inventoryusage = $data->all();

                //create object of class model inventoryusage
                $addinventory = new inventoryUsageModel($inventoryusage + ['status'=>'pending']);

                //save data in function studentprofileModel called inventoryusage()
                $user->inventoryusage()->save($addinventory);

    }

    //delete
    public function deleteinventory($data)
    {
        $deleterequest = inventoryUsageModel::findOrFail($data);
        $deleterequest->delete();
    }


    //display index admin dashboard
    public function listRequestLecture()
    {
        $listAll = inventoryUsageModel::Select()->where('status','LIKE','pending')->with('studentprofile')->get();

       return $listAll;

    }

    //display approve list  for lecture
    public function listApprovetLecture()
    {
        $listAllApprove = inventoryUsageModel::Select()->where('status','LIKE','Approve')->with('studentprofile')->get();

        return $listAllApprove;

    }


    public function updateinventory($data, $dataid)
    {
        $postupdate = inventoryUsageModel::whereid($dataid)->first();

        //retrive user Primary Key data by using session (get from LoginController)
        $getsession = $data->session()->get('userprimarykey');

        //create object of class model lectureprofileModel
        $user = new lectureprofileModel();

       //find the first user_id data (foreign key) in db (table: lectureprofile)
       $user = $user::where('user_id',$getsession)->firstOrFail();



        switch($data->submitbutton)
        {
            case 'Approve Request':

            $postupdate->status = "Approve";

           $user->inventoryusage()->save($postupdate);


            //get quantity value from inventoryitemModel model
            $valueInventoryitem = $postupdate->inventoryitem->quantity;

            //  latest quantity value  = quantity value -1
            $latestvalue = $valueInventoryitem - 1;

            //get itemId primary key
            $foreignkeyItemId = $postupdate->itemId;

            //find itemId in db
            $updateinventoryItem = inventoryitemModel::where('itemId',$foreignkeyItemId)->first();

            //update latest quantity value
            $updateinventoryItem->quantity = $latestvalue;

            //update data
            $updateinventoryItem->save();

            break;
            case 'Reject Request':

            $postupdate->status = "Reject";

            $user->inventoryusage()->save($postupdate);

            break;
        }

    }

    public function infoRequest($id)
    {
        $detailinventory = inventoryUsageModel::where('id',$id)->with('studentprofile')->with('lectureprofile')->with('inventoryitem')->first();

       return $detailinventory;
    }
}
