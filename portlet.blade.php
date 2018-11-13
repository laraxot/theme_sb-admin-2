<div class="col-md-{{$portlet_w}}" >
    <div class="portlet light bordered" >
        <div class="portlet-title">
            <div class="caption">
                <span class="caption-subject font-blue-sharp bold uppercase">{{$portlet_title}}</span>
            </div>
            <div class="actions">
                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                <i class="icon-cloud-upload"></i>
                </a>
                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                <i class="icon-wrench"></i>
                </a>
                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                <i class="icon-trash"></i>
                </a>
            </div>
        </div>
        <div class="portlet-body">
Add a comment to this line
           @yield('portlet_body_'.$portlet_id)
        </div>
    </div>
</div>