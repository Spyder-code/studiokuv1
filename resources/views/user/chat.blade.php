<i class="fas fa-comment-dots float-right fixed-bottom text-success" style="margin-left:90%; font-size:60px;" data-toggle="modal" data-target="#centralModalSuccess"><h6>Chat pemilik studio</h6>
</i>

<!-- Central Modal Medium Success -->
<div class="modal fade" id="centralModalSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-notify modal-side modal-success" role="document">
    <!--Content-->
    <div class="modal-content">
        <!--Header-->
        <div class="modal-header">
        <p class="heading lead">{{$item->nama_studio}}</p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="white-text">&times;</span>
        </button>
        </div>

        <!--Body-->
        <div class="modal-body chating">
        <div class="text-center">
            <div class="d-flex justify-content-start mb-4">
                <div class="img_cont_msg">
                    <img src="{{asset('image/default.jpg')}}" class="rounded-circle user_img_msg">
                </div>
                <div class="msg_cotainer">
                    Hi, how are you samim?
                    <span class="msg_time">8:40 AM, Today</span>
                </div>
            </div>
            <div class="d-flex justify-content-end mb-4">
                <div class="msg_cotainer_send">
                    Hi Khalid i am good tnx how about you?
                    <span class="msg_time_send">8:55 AM, Today</span>
                </div>
                <div class="img_cont_msg">
            <img src="{{asset('image/user.jpg')}}" class="rounded-circle user_img_msg">
                </div>
            </div>
        </div>
        </div>

        <!--Footer-->
        <div class="card-footer">
            <form id="chat">
                <input type="hidden" name="id_mitra" value="">
                <input type="hidden" name="id_user" value="">

                <div class="row">
                    <div class="col">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
                            </div>
                            <textarea name="" class="form-control type_msg" placeholder="Type your message..."></textarea>
                            <div class="input-group-append">
                                <span class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <!--/.Content-->
    </div>
</div>
<!-- Central Modal Medium Success-->
