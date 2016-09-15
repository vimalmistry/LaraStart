@extends('layouts.auth')

@section('content')




    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!

                    <hr/>
                    <a href="#" class="btn btn-primary btn-lg">Large button</a>
                    <a href="#" class="btn btn-primary">Default button</a>
                    <a href="#" class="btn btn-primary btn-sm">Small button</a>
                    <a href="#" class="btn btn-primary btn-xs">Mini button</a>


                    <hr/>

                    <div class="alert alert-dismissible alert-warning">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <h4>Warning!</h4>
                        <p>Best check yo self, you're not looking too good. Nulla vitae elit libero, a pharetra augue. Praesent commodo cursus magna, <a href="#" class="alert-link">vel scelerisque nisl consectetur et</a>.</p>
                    </div>

                </div>
            </div>
            <div class="panel">
                <div class="panel-body">
                    <!-- Newsfeed Content -->
                    <!--===================================================-->
                    <div class="media-block">
                        <a class="media-left" href="#"><img class="img-circle img-sm" alt="Profile Picture" src="http://bootdey.com/img/Content/avatar/avatar1.png"></a>
                        <div class="media-body">
                            <div class="mar-btm">
                                <a href="#" class="btn-link text-semibold media-heading box-inline">Lisa D.</a>
                                <p class="text-muted text-sm"><i class="fa fa-mobile fa-lg"></i> - From Mobile - 11 min ago</p>
                            </div>
                            <p>consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
                            <div class="pad-ver">
                                <div class="btn-group">
                                    <a class="btn btn-sm btn-default btn-hover-success" href="#"><i class="fa fa-thumbs-up"></i></a>
                                    <a class="btn btn-sm btn-default btn-hover-danger" href="#"><i class="fa fa-thumbs-down"></i></a>
                                </div>
                                <a class="btn btn-sm btn-default btn-hover-primary" href="#">Comment</a>
                            </div>
                            <hr>

                            <!-- Comments -->
                            <div>
                                <div class="media-block">
                                    <a class="media-left" href="#"><img class="img-circle img-sm" alt="Profile Picture" src="http://bootdey.com/img/Content/avatar/avatar2.png"></a>
                                    <div class="media-body">
                                        <div class="mar-btm">
                                            <a href="#" class="btn-link text-semibold media-heading box-inline">Bobby Marz</a>
                                            <p class="text-muted text-sm"><i class="fa fa-mobile fa-lg"></i> - From Mobile - 7 min ago</p>
                                        </div>
                                        <p>Sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
                                        <div class="pad-ver">
                                            <div class="btn-group">
                                                <a class="btn btn-sm btn-default btn-hover-success active" href="#"><i class="fa fa-thumbs-up"></i> You Like it</a>
                                                <a class="btn btn-sm btn-default btn-hover-danger" href="#"><i class="fa fa-thumbs-down"></i></a>
                                            </div>
                                            <a class="btn btn-sm btn-default btn-hover-primary" href="#">Comment</a>
                                        </div>
                                        <hr>
                                    </div>
                                </div>

                                <div class="media-block">
                                    <a class="media-left" href="#"><img class="img-circle img-sm" alt="Profile Picture" src="http://bootdey.com/img/Content/avatar/avatar3.png">
                                    </a>
                                    <div class="media-body">
                                        <div class="mar-btm">
                                            <a href="#" class="btn-link text-semibold media-heading box-inline">Lucy Moon</a>
                                            <p class="text-muted text-sm"><i class="fa fa-globe fa-lg"></i> - From Web - 2 min ago</p>
                                        </div>
                                        <p>Duis autem vel eum iriure dolor in hendrerit in vulputate ?</p>
                                        <div class="pad-ver">
                                            <div class="btn-group">
                                                <a class="btn btn-sm btn-default btn-hover-success" href="#"><i class="fa fa-thumbs-up"></i></a>
                                                <a class="btn btn-sm btn-default btn-hover-danger" href="#"><i class="fa fa-thumbs-down"></i></a>
                                            </div>
                                            <a class="btn btn-sm btn-default btn-hover-primary" href="#">Comment</a>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--===================================================-->
                    <!-- End Newsfeed Content -->


                    <!-- Newsfeed Content -->
                    <!--===================================================-->
                    <div class="media-block pad-all">
                        <a class="media-left" href="#"><img class="img-circle img-sm" alt="Profile Picture" src="http://bootdey.com/img/Content/avatar/avatar1.png"></a>
                        <div class="media-body">
                            <div class="mar-btm">
                                <a href="#" class="btn-link text-semibold media-heading box-inline">John Doe</a>
                                <p class="text-muted text-sm"><i class="fa fa-mobile fa-lg"></i> - From Mobile - 11 min ago</p>
                            </div>
                            <p>Lorem ipsum dolor sit amet.</p>
                            <img class="img-responsive thumbnail" src="http://lorempixel.com/400/300/technics/1" alt="Image">
                            <div class="pad-ver">
                                <span class="tag tag-sm"><i class="fa fa-heart text-danger"></i> 250 Likes</span>
                                <div class="btn-group">
                                    <a class="btn btn-sm btn-default btn-hover-success" href="#"><i class="fa fa-thumbs-up"></i></a>
                                    <a class="btn btn-sm btn-default btn-hover-danger" href="#"><i class="fa fa-thumbs-down"></i></a>
                                </div>
                                <a class="btn btn-sm btn-default btn-hover-primary" href="#">Comment</a>
                            </div>
                            <hr>

                            <!-- Comments -->
                            <div>
                                <div class="media-block pad-all">
                                    <a class="media-left" href="#"><img class="img-circle img-sm" alt="Profile Picture" src="http://bootdey.com/img/Content/avatar/avatar2.png"></a>
                                    <div class="media-body">
                                        <div class="mar-btm">
                                            <a href="#" class="btn-link text-semibold media-heading box-inline">Maria Leanz</a>
                                            <p class="text-muted text-sm"><i class="fa fa-globe fa-lg"></i> - From Web - 2 min ago</p>
                                        </div>
                                        <p>Duis autem vel eum iriure dolor in hendrerit in vulputate ?</p>
                                        <div>
                                            <div class="btn-group">
                                                <a class="btn btn-sm btn-default btn-hover-success" href="#"><i class="fa fa-thumbs-up"></i></a>
                                                <a class="btn btn-sm btn-default btn-hover-danger" href="#"><i class="fa fa-thumbs-down"></i></a>
                                            </div>
                                            <a class="btn btn-sm btn-default btn-hover-primary" href="#">Comment</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--===================================================-->
                    <!-- End Newsfeed Content -->
                </div>
            </div>

        </div>
    </div>
@endsection
