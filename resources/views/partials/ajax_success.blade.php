<div class="modal fade" id="ajax-success-modals" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
             </div>

            <div class="modal-body">

                <div class="thank-you-pop">
                    <img src="<?php echo url('assets/images/Green-Round-Tick.png');?>" alt="">
                    <h1>Saved!</h1>
                    <p>Your submission is received </p>
                    <h3 class="cupon-pop">Quote #: <span id="quoteids"></span></h3>

                 </div>

            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="ajax-success-modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
             </div>

            <div class="modal-body">

                <div class="thank-you-pop">
                    <img src="<?php echo url('assets/images/Green-Round-Tick.png');?>" alt="">
                    <h1>Saved!</h1>
                    <p>Your submission is received </p>
                    <h3 class="cupon-pop">Charge #: <span id="cupon-pop-pono"></span></h3>

                 </div>

            </div>

        </div>
    </div>
</div>




<style>
    .thank-you-pop{
	width:100%;
 	padding:20px;
	text-align:center;
}
.thank-you-pop img{
	width:76px;
	height:auto;
	margin:0 auto;
	display:block;
	margin-bottom:25px;
}

.thank-you-pop h1{
	font-size: 42px;
    margin-bottom: 25px;
	color:#5C5C5C;
}
.thank-you-pop p{
	font-size: 20px;
    margin-bottom: 27px;
 	color:#5C5C5C;
}
.thank-you-pop h3.cupon-pop{
	font-size: 25px;
    margin-bottom: 40px;
	color:#222;
	display:inline-block;
	text-align:center;
	padding:10px 20px;
	border:2px dashed #222;
	clear:both;
	font-weight:normal;
}
.thank-you-pop h3.cupon-pop span{
	color:#03A9F4;
}
.thank-you-pop a{
	display: inline-block;
    margin: 0 auto;
    padding: 9px 20px;
    color: #fff;
    text-transform: uppercase;
    font-size: 14px;
    background-color: #8BC34A;
    border-radius: 17px;
}
.thank-you-pop a i{
	margin-right:5px;
	color:#fff;
}
#ajax-success-modal .modal-header{
    border:0px;
}



</style>
