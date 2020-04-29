    <div class="modal fade" id="modalForm" aria-hidden="true" role="dialog" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="modal_content"></div>
        </div>
    </div>
    <!-- Modal DELETE Form -->
    <div class="modal" data-easein="flipYIn" id="del-form" tabindex="-1" role="dialog" aria-hidden="true"  data-backdrop="static" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="del-title"></h4>
                </div>
                <div class="modal-body" id="data-body">
                    <input type="hidden" id="id_del" name="id_del">
                    <input type="hidden" id="lock_status" name="lock_status">
                    <h2><span id="info_delete"></span> </h2>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-rounded" id="delConfirm">
                        <span> <i class="icon-trash"> </i> Yes</span>
                    </button>
                    <button type="button" class="btn btn-default btn-rounded" data-dismiss="modal">
                        <span><i class="icon-exit">No</i></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal" data-easein="flipYIn" id="suspend-form" tabindex="-1" role="dialog" aria-hidden="true"  data-backdrop="static" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="suspend-title"></h4>
                </div>
                <div class="modal-body" id="data-body">
                    <input type="hidden" id="id_bom" name="id_bom">
                    <input type="hidden" id="lock_status" name="lock_status">
                    <h2><span id="info_suspend"></span> </h2>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-rounded" id="suspendConfirm">
                        <span> Yes</span>
                    </button>
                    <button type="button" class="btn btn-default btn-rounded" data-dismiss="modal">
                        <span><i class="icon-exit">No</i></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal" data-easein="flipYIn" id="delHeader" tabindex="-1" role="dialog" aria-hidden="true"  data-backdrop="static" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="del-titleHeader"></h4>
                </div>
                <div class="modal-body" id="data-body">
                    <input type="hidden" id="id_delHeader" name="id_delHeader">
                    <input type="hidden" id="lock_status" name="lock_status">
                    <h3><span id="info_deleteData"></span> </h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-rounded" id="delHeaderConfirm">
                        <span> Yes</span>
                    </button>
                    <button type="button" class="btn btn-default btn-rounded" data-dismiss="modal">
                        <span><i class="icon-exit">No</i></span>
                    </button>
                </div>
            </div>
        </div>
    </div>