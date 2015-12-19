<div class="col-md-6">

    <div class="page-header">
        <h1> Domains </h1>
    </div>

    <div class="row">
        <div ng-repeat="x in domains">
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail" style="min-height: 180px; min-width: 150px;">
                    <div class="caption">
                        <h3>
                            <a href=" @{{ '#d/' + x.id + '/c/' + x.generalId }}">
                                @{{ x.name }}
                            </a>
                        </h3>
                        <p> @{{ x.description }} </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>