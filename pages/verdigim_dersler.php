<?php
//include('includes/httpful.phar');

$user_name=$_SESSION["userName"];
$user_token=$_SESSION["key"];



$users_json=getApi($user_token,'http://127.0.0.1:8000/users/?format=json');
$lecturer_json=getApi($user_token,'http://127.0.0.1:8000/lecturers/?format=json');
$courses_json=getApi($user_token,'http://127.0.0.1:8000/courses/?format=json');
?>

 
<?php
for($i=0;$i<$users_json["count"];$i++){
    if($users_json["results"][$i]["username"]==$user_name){
        $array=explode("/", $users_json["results"][$i]["url"]);
        $user_id=$array[count($array)-2];
        $first_name=$users_json["results"][$i]["first_name"];
        $last_name=$users_json["results"][$i]["last_name"];
    }
}

for($i=0;$i<$lecturer_json["count"];$i++){
    if($lecturer_json["results"][$i]["user"]==$user_id){
        $array=explode("/", $lecturer_json["results"][$i]["url"]);
        $lecturer_id=$array[count($array)-2];
        $degree=$lecturer_json["results"][$i]["degree"];       
    }
}

for($i=0;$i<$courses_json["count"];$i++){
    if($courses_json["results"][$i]["lecturer"]==$lecturer_id){
        $array=explode("/", $courses_json["results"][$i]["url"]);
        $user_id=$array[count($array)-2];
        $course_name[]=$courses_json["results"][$i]["name"];
        $course_code[]=$courses_json["results"][$i]["code"];
        $course_credi[]=$courses_json["results"][$i]["credit"];
        $course_ects[]=$courses_json["results"][$i]["ects"];
        $course_type[]=$courses_json["results"][$i]["c_type"];
        $teori_hour[]=$courses_json["results"][$i]["course_hour"];
        $lab_hour[]=$courses_json["results"][$i]["lab_hour"];
    }
}


?>

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-user-md"></i> <?php echo "$degree  "." $first_name "."$last_name" ?> </h3>
                    
				</div>
			</div>
              <!-- page start-->

              <div class="row">
                  
                      <section class="panel">
                          <header class="panel-heading">
                             Verilen Dersler
                          </header>
                          <table class="table table-hover">
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Ders Adı</th>
                                  <th>Ders Kodu</th>
                                  <th >Ders Tipi</th>
                                  <th>Kredi</th>
                                  <th>AKTS</th>
                                  <th>Teori Saat Sayısı</th>
                                  <th>Uygulama Saat Sayısı</th>
                              </tr>
                              </thead>
                              <tbody>
                              
                              <?php
                              for($i=0;$i<count($course_name);$i++){
                               ?>
                              <tr >
                                  
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo "$course_name[$i]" ?></td>
                                        <td><?php echo "$course_code[$i]" ?></td>
                                        <td><?php echo "$course_type[$i]" ?></td>
                                        <td><?php echo "$course_credi[$i]" ?></td>
                                        <td><?php echo "$course_ects[$i]" ?></td>
                                        <td><?php echo "$teori_hour[$i]" ?></td>
                                        <td><?php echo "$lab_hour[$i]" ?></td>
                                  
                              </tr>
                              <?php
                              }
                               ?>
                               
                              
                              </tbody>
                          </table>
                      </section>
                  
              </div>
              
              <!-- page end-->
          </section>
      </section>