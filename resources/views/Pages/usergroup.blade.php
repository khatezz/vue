@extends('Layout.master')

@section('content')
<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bgm-blue m-b-20">
                        <h2> <i class="zmdi zmdi-apps"></i> USER GROUPS</h2>
                    </div>
                    <div class="card-body card-padding">
                        <div class="conatiner">
                            <div class="input-group fg-float">
                                <span class="input-group-addon"><i class="zmdi zmdi-accounts"></i></span>
                                <div class="fg-line">
                                    <input type="text" class="form-control"
                                           data-trigger="hover" 
                                           data-toggle="popover"
                                           data-placement="right"
                                           title="" 
                                           data-original-title="Group name">
                                   
                                </div>
                            </div> 
                        </div>
                        <br>
                        <div class="input-group fg-float">
                            <span class="input-group-addon"><i class="zmdi zmdi-collection-text"></i></span>
                            <div class="fg-line">
                                <textarea class="form-control auto-size" 
                                          placeholder="Description"  
                                          data-trigger="hover" 
                                          data-toggle="popover"
                                          data-placement="right"
                                          title="" 
                                          data-original-title="Description"></textarea>
                            </div>
                        </div>
                        <br><br>
                        <button type="button" class="btn btn-warning">Add new user group</button>
                        <button type="button" class="btn btn-danger">Clear</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bgm-blue m-b-20">
                        <h2> <i class="zmdi zmdi-apps"></i> ALL USER GROUPS</h2>
                    </div>

                    <div class="card-body card-padding">
                        <table class="table table-bordered table-hover">
                            <tbody>
                                <tr>
                                    <td>Recruitment</td>
                                    <td>Recruitment team</td>
                                    <td>
                                        <a href="javascript:;" type="button" class="btn btn-primary btn-sm"
                                           data-trigger="hover" 
                                           data-toggle="popover"
                                           data-placement="top"
                                           title="" 
                                           data-original-title="Update user group"> 
                                           <i class="zmdi zmdi-edit"></i> 
                                         </a>
                                        <a href="javascript:;" type="button" class="btn btn-danger btn-sm"  
                                           data-trigger="hover" 
                                           data-toggle="popover"
                                           data-placement="top"
                                           title="" 
                                           data-original-title="Remove user group"> 
                                           <i class="zmdi zmdi-delete"></i> 
                                       </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection