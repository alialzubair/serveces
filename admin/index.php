<?php
include 'init.php';
//get count of emploee
$emp=DB::getInstace()->all('members')->count();
//get count of orders
$orders=DB::getInstace()->all('orders')->count();
//get count of serves
$servs=DB::getInstace()->all('serv')->count();
//get all message
$msgs=DB::getInstace()->all('message')->count();
//get last emploee registered
$allData=DB::getInstace()->query('SELECT members.*,serv.* from members
JOIN serv ON
members.serv_id=serv.id where groups !=1 limit 5');
?>
   
  <!-- section of breadcrumd -->
  <section id="breadcrumd">
      <div class="container">
          <ol class="breadcrumd">
              <li class="active"><a href="">Dashbord</a> </li>
          </ol>
      </div>

  </section>

  <!-- main -->
  <section id="main">
      <div class="container">
          <div class="row">
              <div class="col-md-3">
                  <div class="list-group">
                      <a href="index.html" class="list-group-item active"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashbord</a>
                      <a href="pages.html" class="list-group-item "><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> employee <span class="badge"><?php echo $emp ?></span></a>
                      <a href="post.html" class="list-group-item "><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Orders <span class="badge"><?php echo $orders ?></span></a>
                      <a href="user.html" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Servise <span class="badge"><?php echo $servs?></span></a>

                  </div>
                  <div class="well">
                      <h4>Disk space using</h4>
                      <div class="progress">
                          <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="60" style="width:90%">90%</div>
                      </div>

                      <h4>BindWidth Used</h4>
                      <div class="progress">
                          <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="60%" style="width:60%">40%</div>
                      </div>
                  </div>
              </div>

              <div class="col-md-9">
                  <div class="panel panel-default">
                      <div class="panel-heading main-color">
                          <h3 class="panel-title">Website overview</h3>
                      </div>
                      <div class="panel-body">
                          <!-- manage users -->
                          <div class="col-md-3">
                              <div class="well dash-box">
                                  <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span><a href="members.php?do=manage"><span><?php echo $emp ?></span></a> </h2>
                                  <h4>employee</h4>
                              </div>
                          </div>
                          <!-- end mange user -->

                          <!-- manage posts -->
                          <div class="col-md-3">
                                <div class="well dash-box">
                                    <h2><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                                    <a href="serves.php?do=manage"><?php echo $servs ?></a>
                                    </h2>
                                    <h4>serves</h4>
                                  
                                </div>
                            </div>
                          <!-- end manage post -->

                          <!-- manage pages -->
                          <div class="col-md-3">
                                <div class="well dash-box">
                                    <h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                     <a href="orders.php"><?php echo $orders ?></a>
                                    </h2>
                                    <h4>Pages</h4>
                                </div>
                            </div>
                          <!-- end manage pages -->

                          <!-- mange the message -->

                          <div class="col-md-3">
                                <div class="well dash-box">
                                    <h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                     <a href="message.php"><?php echo $msgs ?></a>
                                    </h2>
                                    <h4>message</h4>
                                </div>
                            </div>

                          <!-- end manage vistor -->
                      </div>
                  </div>

                  <!-- strat the view users -->
                  <div class="panel panel-default">
                      <div class="panel-heading main-color">
                          <h4 class="panel-title">Lastes Users</h4>
                      </div>
                      <div class="panel-body">
                         <table class="table table-striped table-hover">
                             <tr>
                                 <th>id</th>
                                 <th>name</th>
                                 <th>address</th>
                                 <th>phone</th>
                                 <th>serves</th>
                             </tr>
                             
                             <?php foreach($allData->result() as $d):  ?>
                                <tr>
                                 <td><?php echo $d->me_id  ?></td>
                                 <td><?php echo $d->full_name  ?></td>
                                 <td><?php echo $d->address  ?></td>
                                 <td><?php echo $d->phone  ?></td>
                                 <td><?php echo $d->name_serves  ?></td>
                                </tr>
                            <?php endforeach;?>
                            
                             
                         </table>
                      </div>
                  </div>


                  <!-- end view users -->


              </div>
          </div>
      </div>
  </section>

  <!-- model -->

  <!-- end model -->

  <!-- addpage -->
  <div class="modal fade" id="addpage" tabindex="1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              
              <div class="modal-header">
                  <button class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true"> </span></button>
                  <h4 class="modal-title" id="myModalLabel">modal title</h4>
              </div>
              <div class="modal-body"></div>
                  <form action="">
                        <div class="modal-header">
                                <button class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true"> </span></button>
                                <h4 class="modal-title" id="myModalLabel">modal title</h4>
                            </div>
                            <div class="modal-body"></div>
                                <div class="form-group">
                                    <label>page title</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                      <label>page body</label>
                                      <textarea name="" id="" cols="15" rows="5" class="form-control"></textarea>
                                  </div>
                                  <div class="check-box">
                                          <label>page check
                                          <input type="checkbox">
                                          </label>
                                      </div>
                                      <div class="form-group">
                                              <label>meta tag</label>
                                              <input type="text" class="form-control">
                                          </div>
                                          <div class="form-group">
                                                  <label>meta description</label>
                                                  <input type="text" class="form-control">
                                              </div>
                  </form>
              <div class="modal-footer">
                  <button type="button" class="btn btn-info" data-dismiss="modal">close</button>
                  <button type="button" class="btn btn-danger">save change</button>
              </div>
          </div>
      </div>
  </div>

  <!-- end add page -->

  <!-- footer -->
  <footer id="footer">
   <p>All copyright by &copy; 2019</p>
  </footer>
