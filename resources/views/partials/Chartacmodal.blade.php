<style>
    .containers ul {
    padding: 0em;
}

.containers ul li,.containers ul li ul li {
    position:relative;
    top:0;
    bottom:0;
    padding-bottom: 7px;

}

.containers ul li ul {
    margin-left: 4em;
}

.containers li {
    list-style-type: none;
}

.containers li a {
    padding:0 0 0 10px;
    position: relative;
    top:1em;
}

.containers li a:hover {
    text-decoration: none;
}

.containers a.addBorderBefore:before {
    content: "";
    display: inline-block;
    width: 2px;
    height: 28px;
    position: absolute;
    left: -47px;
    top:-16px;
    border-left: 1px solid gray;
}

.containers li:before {
    content: "";
    display: inline-block;
    width: 25px;
    height: 0;
    position: relative;
    left: 0em;
    top:1em;
    border-top: 1px solid gray;
}

.containers ul li ul li:last-child:after,.containers ul li:last-child:after {
    content: '';
    display: block;
    width: 1em;
    height: 1em;
    position: relative;
    background: #fff;
    top: 9px;
    left: -1px;
}
</style>

@php
    $BranchCode =config('app.MBranchCode');

@endphp

<div class="modal fade bd-example-modal-lg" id="chart"  tabindex="-1" role="dialog" aria-labelledby="searchrmod" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div  class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Search in Chart Of Account</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body gc-modal-body">
            <div class="containers">
                <ul>
                @foreach (DB::table('acfile3')->where('ACode2',0)->where('ACode3',0)->orderBy('acode1')->orderBy('acode2')->orderBy('acode3')->orderBy('acode4')->orderBy('acode5')->orderBy('ACODE6')->orderBy('ACODE7')->get() as $l1)
                    <li ><a class="parrent" data-acname="{{ $l1->AcName3 }}" data-accode="{{ $l1->ActCode }}"
                        >{{ $l1->AcName3 }}</a>
                        <ul>
                        @foreach (DB::table('acfile3')->where('TitleLevel1',$l1->AcName3)->where('ACode3',0)->orderBy('acode1')->orderBy('acode2')->orderBy('acode3')->orderBy('acode4')->orderBy('acode5')->orderBy('ACODE6')->orderBy('ACODE7')->get() as $l2)
                            <li id="child"><a class="parrent" data-acname="{{ $l2->AcName3 }}" data-accode="{{ $l2->ActCode }}"
                                >{{ $l2->AcName3 }}</a>
                                <ul>
                                @foreach (DB::table('acfile3')->where('TitleLevel1',$l1->AcName3)->where('TitleLevel2',$l2->AcName3)->orderBy('acode1')->orderBy('acode2')->orderBy('acode3')->orderBy('acode4')->orderBy('acode5')->orderBy('ACODE6')->orderBy('ACODE7')->get() as $l3)
                                    <li id="grandchild"><a class="parrent" data-acname="{{ $l3->AcName3 }}" data-accode="{{ $l3->ActCode }}"
                                       >{{ $l3->AcName3 }}</a>

                                    </li>
                                @endforeach
                                </ul>
                            </li>
                        @endforeach
                        </ul>
                    </li>
                @endforeach
                </ul>
            </div>
        </div>

      </div>
    </div>
  </div>


<script>
$(document).ready(function () {

    $('.containers ul').each(function(){
  $this = $(this);
  $this.find("li").has("ul").addClass("hasSubmenu");
});
// Find the last li in each level
$('.containers li:last-child').each(function(){
  $this = $(this);
  // Check if LI has children
  if ($this.children('ul').length === 0){
    // Add border-left in every UL where the last LI has not children
    $this.closest('ul').css("border-left", "1px solid gray");
  } else {
    // Add border in child LI, except in the last one
    $this.closest('ul').children("li").not(":last").css("border-left","1px solid gray");
    // Add the class "addBorderBefore" to create the pseudo-element :defore in the last li
    $this.closest('ul').children("li").last().children("a").addClass("addBorderBefore");
    // Add margin in the first level of the list
    $this.closest('ul').css("margin-top","1px");
    // Add margin in other levels of the list
    $this.closest('ul').find("li").children("ul").css("margin-top","20px");
  };
  if ($this.parents('ul').length > 1) {
    $this.closest('ul').hide();
    $this.prev('li').children('a').children('.fa-minus-circle').hide();
    $this.prev('li').children('a').children('.fa-plus-circle').show();
  }
});
// Add bold in li and levels above
$('.containers ul li').each(function(){
  $this = $(this);
  $this.mouseenter(function(){
    $( this ).children("a").css({"font-weight":"bold","color":"#336b9b"});
  });
  $this.mouseleave(function(){
    $( this ).children("a").css({"font-weight":"normal","color":"#428bca"});
  });
});
// Add button to expand and condense - Using FontAwesome
$('.containers ul li.hasSubmenu').each(function(){
  $this = $(this);
  $this.prepend("<a href='#'><i class='fa fa-plus-circle'></i><i style='display:none;' class='fa fa-minus-circle'></i></a>");
  $this.children("a").not(":last").removeClass().addClass("toogle");
});
// Actions to expand and consense
$('.containers ul li.hasSubmenu a.toogle').click(function(){
  $this = $(this);
  $this.closest("li").children("ul").toggle("slow");
  $this.children("i").toggle();
  return false;
});


});

</script>
