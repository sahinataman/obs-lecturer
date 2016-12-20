<?php
//include('includes/httpful.phar');

$user_name=$_SESSION["userName"];
$user_token=$_SESSION["key"];

$announcements_json=getApi($user_token,'http://127.0.0.1:8000/announcements/?format=json');
?>

 
<?php


for($i=0;$i<$announcements_json["count"];$i++){
        $array=explode("/", $announcements_json["results"][$i]["url"]);
        $user_id=$array[count($array)-2];
        $created_date[]=$announcements_json["results"][$i]["created_date"];
        $description[]=$announcements_json["results"][$i]["description"];
        $title[]=$announcements_json["results"][$i]["title"];   
        $finish_date[]=$announcements_json["results"][$i]["finish_date"]; 
        $duyuru_id[]=$announcements_json["results"][$i]["id"]; 
}


?>
    <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
             <div class="row">
				<div class="col-lg-12">
                    <h3 class="page-header"><i class="icon_genius"></i>DUYURULAR</h3>
                    
				</div>
			</div>
              <!-- page start-->

              <div class="row">
                  
                      <section class="panel">
                          <table class="table table-hover">
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Başlık</th>
                                  <th>Yayın Tarihi</th>
                                  <th>Son Yayın Tarihi</th>
                              </tr>
                              </thead>
                              <tbody>
                              
                              <?php
                              for($i=0;$i<count($description);$i++){
                               ?>
                              <tr >
                                  <td><?php echo $i; ?></td>
                                        <td><a href="?path=duyuru&id=<?php echo "$duyuru_id[$i]" ?>"><?php echo "$title[$i]" ?></td>
                                        <td><?php echo "$created_date[$i]" ?></td>
                                        <td><?php echo "$finish_date[$i]" ?></td>                                                                     
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