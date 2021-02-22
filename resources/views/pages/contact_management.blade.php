@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Travel Quoting System | Contact')
@section('vendor-styles')
  <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/extensions/bootstrap-treeview.min.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/forms/select/select2.min.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/editors/quill/katex.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/editors/quill/monokai-sublime.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/editors/quill/quill.snow.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/editors/quill/quill.bubble.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/pickers/pickadate/pickadate.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/pickers/daterange/daterangepicker.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/ui/prism.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/file-uploaders/dropzone.min.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/forms/spinner/jquery.bootstrap-touchspin.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/animate/animate.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/extensions/sweetalert2.min.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/charts/apexcharts.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/extensions/dragula.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/pickers/daterange/daterangepicker.css')}}">

@endsection
@section('custom-horizontal-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/core/menu/menu-types/horizontal-custom-menu.css')}}">
@endsection

@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/widgets.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/pages/app-chat.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/pages/app-file-manager.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/plugins/extensions/ext-component-treeview.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/plugins/forms/validation/form-validation.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/plugins/file-uploaders/dropzone.css')}}">
  <style>
    .add_product_title {
      margin: 5px 0;
      font-size: 20px;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
      margin-left: 25px;
    }
  </style>
@endsection

@section('content')
<div class="alert bg-rgba-primary">
  <i class="bx bx-info-circle mr-1 align-middle"></i>
  <span class="align-middle">
    Click <a href="https://getbootstrap.com/docs/4.3/components/card/" target="_blank"><u>here</u></a>
    for more info on cards.
  </span>
</div>
<!-- Basic card section start -->

<section id="content-types">
  <div class="row">
    <div class="col-xl-5 col-md-5 col-sm-5">
      <div class="card collapse-icon accordion-icon-rotate">
        <div class="card-header">
          <h1 class="card-title pl-1">Services For Booking</h1>
        </div>
        <div class="card-content">
          <div class="card-body">
            <div class="accordion" id="cardAccordion">
              <div class="card">
                <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne"
                  aria-expanded="false" aria-controls="collapseOne" role="button">
                  <span class="collapsed collapse-title">Accordion Item 1</span>
                </div>
                <div id="collapseOne" class="collapse pt-1" aria-labelledby="headingOne" data-parent="#cardAccordion">
                  <div class="card-body">
                    Cheesecake muffin cupcake dragée lemon drops tiramisu cake gummies chocolate cake. Marshmallow tart
                    croissant. Tart dessert tiramisu marzipan lollipop lemon drops.
                  </div>
                </div>
              </div>
              <div class="card collapse-header">
                <div class="card-header" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo"
                  aria-expanded="false" aria-controls="collapseTwo" role="button">
                  <span class="collapsed collapse-title">Accordion Item 2</span>
                </div>
                <div id="collapseTwo" class="collapse pt-1" aria-labelledby="headingTwo" data-parent="#cardAccordion">
                  <div class="card-body">
                    Pastry pudding cookie toffee bonbon jujubes jujubes powder topping. Jelly beans gummi bears sweet
                    roll bonbon muffin liquorice. Wafer lollipop sesame snaps.
                  </div>
                </div>
              </div>
              <div class="card open">
                <div class="card-header" id="headingThree" data-toggle="collapse" data-target="#collapseThree"
                  aria-expanded="true" aria-controls="collapseThree" role="button">
                  <span class="collapsed collapse-title">Accordion Item 3</span>
                </div>
                <div id="collapseThree" class="collapse show pt-1" aria-labelledby="headingThree"
                  data-parent="#cardAccordion">
                  <div class="card-body">
                    Sweet pie candy jelly. Sesame snaps biscuit sugar plum. Sweet roll topping fruitcake. Caramels
                    liquorice biscuit ice cream fruitcake cotton candy tart.
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingFour" data-toggle="collapse" data-target="#collapseFour"
                  aria-expanded="false" aria-controls="collapseFour" role="button">
                  <span class="collapsed  collapse-title">Accordion Item 4</span>
                </div>
                <div id="collapseFour" class="collapse pt-1" aria-labelledby="headingFour" data-parent="#cardAccordion">
                  <div class="card-body">
                    Sweet pie candy jelly. Sesame snaps biscuit sugar plum. Sweet roll topping fruitcake. Caramels
                    liquorice biscuit ice cream fruitcake cotton candy tart.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-7 col-md-7 widget-chat-card">
      <div class="widget-chat widget-chat-messages">
        <div class="card">
          <div class="card-header border-bottom p-0">
            <div class="media m-75">
              <a class="media-left" href="JavaScript:void(0);">
                <div class="avatar mr-75">
                  <img src="{{asset('images/portrait/small/avatar-s-2.jpg')}}" alt="avtar images" width="32"
                    height="32">
                  <span class="avatar-status-online"></span>
                </div>
              </a>
              <div class="media-body">
                <h6 class="media-heading mb-0 pt-25"><a href="javaScript:void(0);">Kiara Cruiser</a>
                </h6>
                <span class="text-muted font-small-3">Active</span>
              </div>
              <i class="bx bx-x float-right my-auto cursor-pointer"></i>
            </div>
          </div>
          <div class="card-body widget-chat-container widget-chat-scroll">
            <div class="chat-content">
              <div class="chat">
                <div class="chat-body">
                  <div class="chat-message">
                    <p>How can we help? We're here for you! 😄</p>
                    <span class="chat-time">7:45 AM</span>
                  </div>
                </div>
              </div>
              <div class="chat chat-left">
                <div class="chat-body">
                  <div class="chat-message">
                    <p>Hey John, I am looking for the best admin template.</p>
                    <p>Could you please help me to find it out? 🤔</p>
                    <span class="chat-time">7:50 AM</span>
                  </div>
                  <div class="chat-message">
                    <p>It should be Bootstrap 4 🤩 compatible.</p>
                    <span class="chat-time">7:58 AM</span>
                  </div>
                </div>
              </div>
              <div class="badge badge-pill badge-light-secondary my-1">Yesterday</div>
              <div class="chat">
                <div class="chat-body">
                  <div class="chat-message">
                    <p>Absolutely!</p>
                    <span class="chat-time">8:00 AM</span>
                  </div>
                  <div class="chat-message">
                    <p>Stack admin is the responsive bootstrap 4 admin template.</p>
                    <span class="chat-time">8:01 AM</span>
                  </div>
                </div>
              </div>
              <div class="chat chat-left">
                <div class="chat-body">
                  <div class="chat-message">
                    <p>Looks clean and fresh UI. 😃</p>
                    <span class="chat-time">10:12 AM</span>
                  </div>
                  <div class="chat-message">
                    <p>It's perfect for my next project.</p>
                    <span class="chat-time">10:15 AM</span>
                  </div>
                  <div class="chat-message">
                    <p>How can I purchase 🤑 it?</p>
                    <span class="chat-time">10:18 AM</span>
                  </div>
                </div>
              </div>
              <div class="chat">
                <div class="chat-body">
                  <div class="chat-message">
                    <p>Thanks 🤝 , from ThemeForest.</p>
                    <span class="chat-time">10:20 AM</span>
                  </div>
                </div>
              </div>
              <div class="chat chat-left">
                <div class="chat-body">
                  <div class="chat-message">
                    <p>I will purchase it for sure. 👍</p>
                    <span class="chat-time">3:32 PM</span>
                  </div>
                  <div class="chat-message">
                    <p>Thanks.</p>
                    <span class="chat-time">3:33 PM</span>
                  </div>
                </div>
              </div>
              <div class="chat">
                <div class="chat-body">
                  <div class="chat-message">
                    <p>Great, Feel free to get in touch on</p>
                    <span class="chat-time">3:34 PM</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer border-top p-1">
            <form class="d-flex align-items-center" onsubmit="widgetMessageSend();" action="javascript:void(0);">
              <i class="bx bx-face cursor-pointer"></i>
              <i class="bx bx-paperclip ml-75 cursor-pointer"></i>
              <input type="text" class="form-control widget-chat-message mx-75" placeholder="Type here...">
              <button type="submit" class="btn btn-primary glow"><i class="bx bx-paper-plane"></i></button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- chat Widget Ends -->

  </div>
</section>
<!-- Basic Card types section end -->

@endsection


@section('vendor-scripts')

  <script src="{{asset('vendors/js/extensions/bootstrap-treeview.min.js')}}"></script>

  <script src="{{asset('vendors/js/forms/validation/jqBootstrapValidation.js')}}"></script>
  <script src="{{asset('vendors/js/forms/validation/jquery.validate.min.js')}}"></script>

  <script src="{{asset('vendors/js/forms/select/select2.full.min.js')}}"></script>

  <script src="{{asset('vendors/js/pickers/pickadate/picker.js')}}"></script>
  <script src="{{asset('vendors/js/pickers/pickadate/picker.date.js')}}"></script>
  <script src="{{asset('vendors/js/pickers/pickadate/picker.time.js')}}"></script>
  <script src="{{asset('vendors/js/pickers/pickadate/legacy.js')}}"></script>
  <script src="{{asset('vendors/js/pickers/daterange/moment.min.js')}}"></script>
  <script src="{{asset('vendors/js/pickers/daterange/daterangepicker.js')}}"></script>

  <script src="{{asset('vendors/js/editors/quill/katex.min.js')}}"></script>
  <script src="{{asset('vendors/js/editors/quill/highlight.min.js')}}"></script>
  <script src="{{asset('vendors/js/editors/quill/quill.min.js')}}"></script>
  <script src="{{asset('vendors/js/extensions/jquery.steps.min.js')}}"></script>

  <script src="{{asset('vendors/js/extensions/dropzone.min.js')}}"></script>
  <script src="{{asset('vendors/js/ui/prism.min.js')}}"></script>

  <script src="{{asset('vendors/js/forms/spinner/jquery.bootstrap-touchspin.js')}}"></script>

  <script src="{{asset('//maps.googleapis.com/maps/api/js?key=AIzaSyBgjNW0WA93qphgZW-joXVR6VC3IiYFjfo')}}"></script>
  <script src="{{asset('vendors/js/charts/gmaps.min.js')}}"></script>

  <script src="{{asset('vendors/js/forms/repeater/jquery.repeater.min.js')}}"></script>

  <script src="{{asset('vendors/js/ckeditor/ckeditor.js')}}"></script>
  <script src="{{asset('vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
  <script src="{{asset('vendors/js/extensions/polyfill.min.js')}}"></script>
  <script src="{{asset('vendors/js/pickers/daterange/moment.min.js')}}"></script>
<script src="{{asset('vendors/js/pickers/daterange/daterangepicker.js')}}"></script>
<script src="{{asset('vendors/js/charts/apexcharts.min.js')}}"></script>
  <script src="{{asset('vendors/js/extensions/dragula.min.js')}}"></script>
  <script src="{{asset('vendors/js/extensions/swiper.min.js')}}"></script>
@endsection

@section('page-scripts')
  <script>
      var base_url = "{{ url('/') }}";
      function back(){
          document.location.href=base_url + '/';
      }
  </script>
  <script src="{{asset('js/scripts/pages/product_edit.js')}}"></script>
  <script src="{{asset('js/scripts/pages/app-chat.js')}}"></script>
  <script src="{{asset('js/scripts/cards/widgets.js')}}"></script>
@endsection
