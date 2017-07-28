<?php
use app\models\User;
if(count($data)==0){
    echo '<i>Mời thêm tài khoản admin</i>';
}?>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>STT</th>
              <th>Ten</th>
              <th>Số điện thoại</th>
              <th>Quyền</th>
            </tr>
          </thead>
          <tbody>
<?php
 $i=1;
foreach ($data as $key => $value) {
         $user = User::find()->where('id='.$value['user_id'])->one();
?>

            <tr>
              <th scope="row"><?php echo $i ?></th>
              <td><?php echo $user['fullname'] ?></td>
              <td><?php echo $user['phone'] ?></td>
              <td><?php echo $user->getRoleShool() ?></td>
            </tr>
            

       
           
 <?php  $i++;  }?>
            
          </tbody>
        </table>
          