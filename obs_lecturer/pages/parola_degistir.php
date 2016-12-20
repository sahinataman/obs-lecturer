<?php

	$user_name = $_SESSION["userName"];
	$user_token = $_SESSION["key"];
	
	$users_json=getApi($user_token,'http://127.0.0.1:8000/users/?format=json');
	$students_json=getApi($user_token,'http://127.0.0.1:8000/students/?format=json');
	
	for($i=0;$i<$users_json["count"];$i++)
	{
		if($users_json["results"][$i]["username"]==$user_name)
		{
			$array=explode("/", $users_json["results"][$i]["url"]);
			$user_id=$array[count($array)-2];
			$first_name=$users_json["results"][$i]["first_name"];
			$last_name=$users_json["results"][$i]["last_name"];
		}
	}
	
	for($i=0;$i<$students_json["count"];$i++)
	{
		if($students_json["results"][$i]["user"]==$user_id)
		{
			$image_url=$students_json["results"][$i]["image"];
		}
	}

?>

 <section id="main-content">
          <section class="wrapper">
		  <div class="row"> 
			</div>
              <div class="row">
                <!-- profile-widget -->
                <div class="col-lg-12">
                    <div class="profile-widget profile-widget-info">
                          <div class="panel-body">
                            <div class="col-lg-2 col-sm-2">
                              <h4> <?php echo "$first_name" ." ". "$last_name" ?> </h4>               
                              <div class="follow-ava">
                                  <img src="<?php echo $image_url; ?>" >
                              </div>
                              <h6>Akademisyen</h6>
                            </div>
                             <h1>Çanakkale Onsekiz Mart Üniversitesi</h1>
                             <h2>Akademisyen Bilgi Sistemi</h2>   
                          </div>
                    </div>
                </div>
              </div>
              <!-- page start-->
              <div class="row">
                 <div class="col-lg-12">
                    <section class="panel">
                          <header class="panel-heading tab-bg-info">
                              <ul class="nav nav-tabs">
                                  
                                  <li class="active"> 
                                      <a data-toggle="tab" href="#edit-profile">
                                          <i class="icon-home"></i>
                                          Parola Güncelleme
                                      </a>
                                  </li>
                                  
                              </ul>
                          </header>
                          <div class="panel-body">
                              <div class="tab-content">
                                  
                                  <!-- profile -->
                                  
                                  <!-- edit-profile -->
                                  <div id="edit-profile" class="tab-pane active">
                                    <section class="panel">                                          
                                          <div class="panel-body bio-graph-info">
                                              <h1> Akademisyen Parola Güncelleme</h1>
                                              <form class="form-horizontal" role="form">                                                  
												  
												  <div class="form-group">	 
													  <label class="col-lg-2 control-label">Eski Şifreniz</label>             
													  <div class="col-lg-6">
                                                          <input type="text" class="form-control" id="f-name" placeholder=" ">
                                                      </div>
                                                  </div>
												  
												  <div class="form-group"> 
                                                      <label class="col-lg-2 control-label">Yeni Şifreniz</label>
                                                      <div class="col-lg-6">
                                                          <input type="text" class="form-control" id="l-name" placeholder=" ">
                                                      </div>
                                                  </div>
												  
												  <div class="form-group"> 
                                                      <label class="col-lg-2 control-label">Yeni Şifreniz (Tekrar)</label>
                                                      <div class="col-lg-6">
                                                          <input type="text" class="form-control" id="l-name" placeholder=" ">
                                                      </div>
                                                  </div>
												  
												  <div class="form-group">
                                                      <div class="col-lg-offset-2 col-lg-10">
                                                          <button type="submit" class="btn btn-primary">Şifremi Değiştir</button>
                                                          <button type="button" class="btn btn-danger">İptal</button>
                                                      </div>
                                                  </div>		       
                                              </form>
                                          </div>
                                      </section>
                                  </div>
                              </div>
                          </div>
                      </section>
                 </div>
              </div>

              <!-- page end-->
          </section>
      </section>