<?php

namespace App\Controllers\Admin;

use App\Models\AttributeModel;

class AttributeController extends BaseController
{
      public function showadd()
      {
            $this->view("attribute/add");
      }
      public function add(){
            $data=$_POST;
            $name=$_POST['name'];
            if($name=='size'){
                  $value=$data['size_value'];
            }else if($name=='color'){
                  $value=$data['color_value'];
            }else{
                  return;
            }
            $data=[
                  'name'=>$name,
                  'value'=>$value,
            ];
            AttributeModel::add($data);
            
      }
}
