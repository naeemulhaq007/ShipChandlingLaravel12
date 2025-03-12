@extends('layouts.app')

@section('content')
<style>
    /* @media screen and (max-width: 600px) {
        .fixed-header {
    position: absolute;
    top: 0;
    width: 100%;
  }

  .fixedcard-body {
    padding-top: 120px;
  }
    } */
    /* .fixed-header {
            position: absolute;
            top: 10;
            width: 100%;
            z-index: 1000;
            border-bottom:none;
            transition: background-color 0.3s;
        } */
    .custom-card {
  background-color: #f8f9fa;
  border: 1px solid #ced4da;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  cursor: pointer;
  /* padding: 20px; */
}

.custom-card .card-img-top {
  border-radius: 8px 8px 0 0;
}

.custom-card .card-title {
  color: #333;
  font-size: 18px;
  font-weight: bold;
  /* margin-left: 35px; */
}
/* .custom-card .card-body {

    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    min-height: 1px;
    padding: 0.62rem;
} */
/* .fixedcard-body{
    padding-top:120px;
} */
.custom-card .card-text {
  color: #555;
}

.custom-card .btn-primary {
  background-color: #007bff;
  border-color: #007bff;
}

.custom-card .btn-primary:hover {
  background-color: #0056b3;
  border-color: #0056b3;
}

</style>

    <div class="container-fluid" >
        <div class="card">
            <div class="card-header fixed-header">

                <div class="row ">

                    <div class="card custom-card col-sm-2 " id="SetupsButton">
                        <div class="card-body">
            <div class="row">

                <h5 class="card-title">Setups</h5>
                <img class="img-fluid ml-auto "  src="<?php echo url('assets/images/setupcard.png'); ?>" style="max-width: 50px;height: 50px; margin-top:-10px">
            </div>
        </div>
    </div>
    <div class="card custom-card col-sm-2 " id="ActivityButton">
        <div class="card-body">
            <div class="row">

                <h5 class="card-title">Activity</h5>
                <img class="img-fluid ml-auto "  src="<?php echo url('assets/images/activitycard.png'); ?>" style="max-width: 50px;height: 50px; margin-top:-10px">
            </div>
        </div>
    </div>
    <div class="card custom-card col-sm-2 " id="AccountsButton">
        <div class="card-body">
            <div class="row">

                <h5 class="card-title">Accounts</h5>
                <img class="img-fluid ml-auto "  src="<?php echo url('assets/images/Accountscard.png'); ?>" style="max-width: 50px;height: 50px; margin-top:-10px">
            </div>
        </div>
    </div>
    <div class="card custom-card col-sm-2 " id="InventoryButton">
        <div class="card-body">
            <div class="row">

                <h5 class="card-title">Inventory</h5>
                <img class="img-fluid ml-auto "  src="<?php echo url('assets/images/Inventorycard.png'); ?>" style="max-width: 80px;height: 50px; margin-top:-10px">
            </div>
        </div>
    </div>
    <div class="card custom-card col-sm-2 " id="ReportsButton">
        <div class="card-body">
            <div class="row">

                <h5 class="card-title">Reports</h5>
                <img class="img-fluid ml-auto "  src="<?php echo url('assets/images/Reportcard.png'); ?>" style="max-width: 80px;height: 50px; margin-top:-10px">
            </div>
            </div>
    </div>
    <div class="card custom-card col-sm-2"  id="SecurityButton">
        <div class="card-body">
            <div class="row">
                <h5 class="card-title">Security</h5>
                <i class="img-fluid ml-auto fa-solid fa-gear fa-spin-pulse" style="font-size: 60px"></i>
            </div>
        </div>
    </div>

    </div>
</div>
</div>

        {{-- <button >Scroll to Element</button> --}}
        <div class="row fixedcard-body">

            <div class="col-lg-2 col-4">

                <div class="small-box bg-info">
                    <div class="inner">
                        <h3 id="counte"></h3>
                        <p>Pending Quotation</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="<?php echo url('event-log'); ?>" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-4">

                <div class="small-box bg-success">
                    <div class="inner">
                        {{-- <h3>1 <!--<sup style="font-size: 20px">%</sup>--></h3> --}}
                        <h3 id="VSNLogcount">
                            <!--<sup style="font-size: 20px">%</sup>-->
                        </h3>
                        <p>Pending VSN</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="<?php echo url('Vsn-Log'); ?>" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-4">

                <div class="small-box bg-warning">
                    <div class="inner">
                        {{-- <h3>8</h3> --}}
                        <h3 id="OrderCount"></h3>
                        <p>Pending Order</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    {{-- <a href="<?php// echo url('warehouse-setup ');?> ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

                </div>
            </div>

            <div class="col-lg-2 col-4">

                <div class="small-box bg-danger">
                    <div class="inner">
                        {{-- <h3>66</h3> --}}
                        <h3 id="OrderReceviedCount"></h3>
                        <p>Recived Order</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-2 col-4">

                <div class="small-box bg-blue">
                    <div class="inner">
                        {{-- <h3>66</h3> --}}
                        <h3 id="invoicesReceviedCount"></h3>
                        <p>Recived Invoice</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-2 col-4">

                <div class="small-box bg-dark">
                    <div class="inner">
                        {{-- <h3>66</h3> --}}
                        <h3 id="pInvoice"></h3>
                        <p>Pending Invoice</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Monthly Recap Report</h5>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <div class="btn-group">
                                <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                                    <i class="fas fa-wrench"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" role="menu">
                                    {{-- <a href="#" class="dropdown-item">Action</a>
                                    <a href="#" class="dropdown-item">Another action</a>
                                    <a href="#" class="dropdown-item">Something else here</a>
                                    <a class="dropdown-divider"></a>
                                    <a href="#" class="dropdown-item">Separated link</a> --}}
                                </div>
                            </div>
                            {{-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button> --}}
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <p class="text-center">
                                    <strong>Sales: 1 Jan, 2022 - 30 Jul, 2022</strong>
                                </p>

                                <div class="chart">
                                    <!-- Sales Chart Canvas -->
                                    <canvas id="salesChart" height="180" style="height: 180px;"></canvas>
                                </div>
                                <!-- /.chart-responsive -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-4">
                                <p class="text-center">
                                    <strong>Goal Completion</strong>
                                </p>

                                <div class="progress-group">
                                    Add Products to Cart
                                    <span class="float-right"><b>160</b>/200</span>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-primary" style="width: 80%"></div>
                                    </div>
                                </div>
                                <!-- /.progress-group -->

                                <div class="progress-group">
                                    Complete Purchase
                                    <span class="float-right"><b>310</b>/400</span>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-danger" style="width: 75%"></div>
                                    </div>
                                </div>

                                <!-- /.progress-group -->
                                <div class="progress-group">
                                    <span class="progress-text">Visit Premium Page</span>
                                    <span class="float-right"><b>480</b>/800</span>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-success" style="width: 60%"></div>
                                    </div>
                                </div>

                                <!-- /.progress-group -->
                                <div class="progress-group">
                                    Send Inquiries
                                    <span class="float-right"><b>250</b>/500</span>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-warning" style="width: 50%"></div>
                                    </div>
                                </div>
                                <!-- /.progress-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- ./card-body -->
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-3 col-6">
                                <div class="description-block border-right">
                                    <span class="description-percentage text-success"><i class="fas fa-caret-up"></i>
                                        17%</span>
                                    <h5 id="TOTALREVENUE" class="description-header">$35,210.43</h5>
                                    <span class="description-text">TOTAL REVENUE</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-3 col-6">
                                <div class="description-block border-right">
                                    <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i>
                                        0%</span>
                                    <h5 id="TOTALCOST" class="description-header">$10,390.90</h5>
                                    <span class="description-text">TOTAL COST</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-3 col-6">
                                <div class="description-block border-right">
                                    <span class="description-percentage text-success"><i class="fas fa-caret-up"></i>
                                        20%</span>
                                    <h5 id="TOTALPROFIT" class="description-header">$24,813.53</h5>
                                    <span class="description-text">TOTAL PROFIT</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-3 col-6">
                                <div class="description-block">
                                    <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i>
                                        18%</span>
                                    <h5 id="TotalTransaction" class="description-header">1200</h5>
                                    <span class="description-text">Total Transaction</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>


        <div class="row">

            <section class="col-lg-7 connectedSortable ui-sortable">

                <div class="card">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">Latest Orders</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Customers</th>
                                        <th>Vessel</th>
                                        <th>Status</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody id="allordertablebody">

                                    {{-- <tr>
                                        <td><a href="pages/examples/invoice.html">OR1847</a></td>
                                        <td>Anglo Ship Management</td>
                                        <td><span class="badge badge-success">Shipped</span></td>
                                        <td>
                                            <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                90,80,90,-70,61,-83,63</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="pages/examples/invoice.html">OR1848</a></td>
                                        <td>Samsung Smart TV</td>
                                        <td><span class="badge badge-warning">Pending</span></td>
                                        <td>
                                            <div class="sparkbar" data-color="#f39c12" data-height="20">
                                                90,80,-90,70,61,-83,68</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                        <td>iPhone 6 Plus</td>
                                        <td><span class="badge badge-danger">Delivered</span></td>
                                        <td>
                                            <div class="sparkbar" data-color="#f56954" data-height="20">
                                                90,-80,90,70,-61,83,63</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                        <td>Samsung Smart TV</td>
                                        <td><span class="badge badge-info">Processing</span></td>
                                        <td>
                                            <div class="sparkbar" data-color="#00c0ef" data-height="20">
                                                90,80,-90,70,-61,83,63</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="pages/examples/invoice.html">OR1848</a></td>
                                        <td>Samsung Smart TV</td>
                                        <td><span class="badge badge-warning">Pending</span></td>
                                        <td>
                                            <div class="sparkbar" data-color="#f39c12" data-height="20">
                                                90,80,-90,70,61,-83,68</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                        <td>iPhone 6 Plus</td>
                                        <td><span class="badge badge-danger">Delivered</span></td>
                                        <td>
                                            <div class="sparkbar" data-color="#f56954" data-height="20">
                                                90,-80,90,70,-61,83,63</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                        <td>Call of Duty IV</td>
                                        <td><span class="badge badge-success">Shipped</span></td>
                                        <td>
                                            <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                90,80,90,-70,61,-83,63</div>
                                        </td>
                                    </tr> --}}
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
                        <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
                    </div>
                    <!-- /.card-footer -->
                </div>





                <div class="card">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Online Store Visitors</h3>
                            <a href="javascript:void(0);">View Report</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <p class="d-flex flex-column">
                                <span class="text-bold text-lg">820</span>
                                <span>Visitors Over Time</span>
                            </p>
                            <p class="ml-auto d-flex flex-column text-right">
                                <span class="text-success">
                                    <i class="fas fa-arrow-up"></i> 12.5%
                                </span>
                                <span class="text-muted">Since last week</span>
                            </p>
                        </div>
                        <!-- /.d-flex -->

                        <div class="position-relative mb-4">
                            <canvas id="visitors-chart" height="200"></canvas>
                        </div>

                        <div class="d-flex flex-row justify-content-end">
                            <span class="mr-2">
                                <i class="fas fa-square text-primary"></i> This Week
                            </span>

                            <span>
                                <i class="fas fa-square text-gray"></i> Last Week
                            </span>
                        </div>
                    </div>
                </div>

            </section>


            <section class="col-lg-5 connectedSortable ui-sortable">

                <div class="col-md-12">
                    <!-- Info Boxes Style 2 -->
                    <div class="info-box mb-3 bg-warning">
                        <span class="info-box-icon"><i class="fas fa-tag"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Stock</span>
                            <span class="info-box-number" id="ItemStockCount"></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    <div class="info-box mb-3 bg-success">
                        <span class="info-box-icon"><i class="far fa-heart"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Mentions</span>
                            <span class="info-box-number">92,050</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    <div class="info-box mb-3 bg-danger">
                        <span class="info-box-icon"><i class="fas fa-cloud-download-alt"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Downloads</span>
                            <span class="info-box-number">114,381</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    <div class="info-box mb-3 bg-info">
                        <span class="info-box-icon"><i class="far fa-comment"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Direct Messages</span>
                            <span class="info-box-number">163,921</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <div class="info-box mb-3 bg-primary">
                        <span class="info-box-icon"><i class="far fa-comment"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Direct Messages</span>
                            <span class="info-box-number">163,921</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->

                </div>


                <div class="card">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Sales</h3>
                            <a href="javascript:void(0);">View Report</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <p class="d-flex flex-column">
                                <span class="text-bold text-lg">$18,230.00</span>
                                <span>Sales Over Time</span>
                            </p>
                            <p class="ml-auto d-flex flex-column text-right">
                                <span class="text-success">
                                    <i class="fas fa-arrow-up"></i> 33.1%
                                </span>
                                <span class="text-muted">Since last month</span>
                            </p>
                        </div>
                        <!-- /.d-flex -->

                        <div class="position-relative mb-4">
                            <canvas id="sales-chart" height="200"></canvas>
                        </div>

                        <div class="d-flex flex-row justify-content-end">
                            <span class="mr-2">
                                <i class="fas fa-square text-primary"></i> This year
                            </span>

                            <span>
                                <i class="fas fa-square text-gray"></i> Last year
                            </span>
                        </div>
                    </div>
                </div>




            </section>

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card" id="SetupsElement">
                    <div class="card-header">
                        <h5 class="card-title">Set Ups</h5>


                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>


                        </div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="text-center">

                                <div class="row">

                                    <div id="CmdCompanySetup" class="col-md-2" style="text-align:center">
                                        <a href="<?php echo url('company-setup '); ?>"> <img class="img-fluid" src="<?php echo url('assets/images/company.png'); ?>"
                                                style="max-width:80px" border="0"></a>
                                        <br />
                                        Our Company
                                    </div>
                                    <div id="CmdBranchsetup" class="col-md-2" style="text-align:center">
                                        <a href="<?php echo url('branch-setup '); ?>"><img class="img-fluid" border="0"
                                                src="<?php echo url('assets/images/branch.png'); ?>" style="max-width:80px"></a>
                                        <br />
                                        Branch Setup
                                    </div>
                                    <div id="Button9" class="col-md-2" style="text-align:center">
                                        <a href="<?php echo url('warehouse-setup '); ?>"><img class="img-fluid" src="<?php echo url('assets/images/warehouse.png'); ?>"
                                                style="max-width:80px" boder="0"></a>
                                        <br />
                                        Warehouse Setup
                                    </div>
                                    <div id="CmdAgentSetup" class="col-md-2" style="text-align:center">
                                        <a href="<?php echo url('agent-setup '); ?>"> <img class="img-fluid" src="<?php echo url('assets/images/agents.png'); ?>"
                                                style="max-width:80px" border="0"></a>
                                        <br />
                                        Agent Registration
                                    </div>


                                    <div id="CmdDepartmentSetup" class="col-md-2" style="text-align:center">
                                        <a href="<?php echo url('department-setup '); ?>"> <img class="img-fluid" src="<?php echo url('assets/images/department.png'); ?>"
                                                style="max-width:80px" border="0"></a>
                                        <br />
                                        Department Setup
                                    </div>

                                    <div id="CmdCategorySetup" class="col-md-2" style="text-align:center">
                                        <a href="#"> <img class="img-fluid" src="<?php echo url('assets/images/category.png'); ?>"
                                                style="max-width:80px" border="0"></a>
                                        <br />
                                        Category Setup
                                    </div>

                                    <div id="CmdOriginSetup" class="col-md-2" style="text-align:center">
                                        <a href="<?php echo url('origin-setup '); ?>"><img class="img-fluid" border="0"
                                                src="<?php echo url('assets/images/origin.png'); ?>" style="max-width:80px"></a>
                                        <br />
                                        Origin Setup
                                    </div>


                                    <div id="CmdVendorSetup" class="col-md-2" style="text-align:center">
                                        <a href="<?php echo url('vendor-setup '); ?>"><img class="img-fluid" border="0"
                                                src="<?php echo url('assets/images/vendor-list.png'); ?>" style="max-width:80px"></a>
                                        <br />
                                        Vendor Setup
                                    </div>
                                    <div id="CmdVesselRegSetup" class="col-md-2" style="text-align:center">
                                        <a href="<?php echo url('vessel-setup '); ?>"><img class="img-fluid" border="0"
                                                src="<?php echo url('assets/images/ship-setup.png'); ?>" style="max-width:80px"></a>
                                        <br />
                                        Vessel Setup
                                    </div>
                                    <div id="Button8" class="col-md-2" style="text-align:center">
                                        <a href="#"><img class="img-fluid" border="0"
                                                src="<?php echo url('assets/images/status-setup.png'); ?>" style="max-width:80px"></a>
                                        <br />
                                        Status Setup
                                    </div>

                                    <div id="CmdTermsSetup" class="col-md-2" style="text-align:center">
                                        <a href="<?php echo url('terms-setup '); ?>"><img class="img-fluid" border="0"
                                                src="<?php echo url('assets/images/terms-setup.png'); ?>" style="max-width:80px"></a>
                                        <br />
                                        Terms Setup
                                    </div>

                                    <div id="Button26" class="col-md-2" style="text-align:center">
                                        <a href="#"><img class="img-fluid" border="0"
                                                src="<?php echo url('assets/images/priority-setup.png'); ?>" style="max-width:80px"></a>
                                        <br />
                                        Priority Setup
                                    </div>


                                    <div id="CmdStatusSetup" class="col-md-2" style="text-align:center">
                                        <a href="<?php echo url('quote-setup '); ?>"><img class="img-fluid" border="0"
                                                src="<?php echo url('assets/images/quotation-setup.png'); ?>" style="max-width:80px"></a>
                                        <br />
                                        Quote Status Setup
                                    </div>

                                    <div id="CmdAssignUserColors" class="col-md-2" style="text-align:center">
                                        <a href="#"><img class="img-fluid" border="0"
                                                src="<?php echo url('assets/images/user-colors.png'); ?>" style="max-width:80px"></a>
                                        <br />
                                        Assign User Color
                                    </div>

                                    <div id="CmdCustomerSetup" class="col-md-2" style="text-align:center">
                                        <a href="<?php echo url('customer-setup '); ?>"><img class="img-fluid" border="0"
                                                src="<?php echo url('assets/images/customer-setup.png'); ?>" style="max-width:80px"></a>
                                        <br />
                                        Customer Setup
                                    </div>


                                    <div class="col-md-2" style="text-align:center">
                                        <a href="<?php echo url('shipingport-setup'); ?>"><img class="img-fluid" border="1"
                                                src="<?php echo url('assets/images/shipinngport.png'); ?>" style="max-width:80px;height:80px"></a>
                                        <br />
                                        Shiping Port-setup
                                    </div>
                                    <div id="CmdItemSetupProvision" class="col-md-2" style="text-align:center">
                                        <a href="<?php echo url('Item-Register-Setup'); ?>"><img class="img-fluid" border="1"
                                                src="<?php echo url('assets/images/quotation-View.png'); ?>" style="max-width:80px"></a>
                                        <br />
                                        Item Registration Setup
                                    </div>
                                    <div id="Button76" class="col-md-2" style="text-align:center">
                                        <a href="<?php echo url('Vendor-Contract-Provision'); ?>"><img class="img-fluid" border="1"
                                                src="<?php echo url('assets/images/vendorcontract.png'); ?>" style="max-width:80px"></a>
                                        <br />
                                        Vendor Contract Provision
                                    </div>

                                </div>
                                <div class="row">
                                    <div id="ToolStripMenuItem8" class="col-md-2" style="text-align:center">
                                        <a href="<?php echo url('Fix-Account-Setup'); ?>"><img class="img-fluid" border="1"
                                                src="<?php echo url('assets/images/FixAccount.png'); ?>" style="max-width:80px;height:80px"></a>
                                        <br />
                                        Fix Account Setup
                                    </div>


                                </div>

                                </p>


                            </div>
                            <!-- /.col -->

                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- ./card-body -->

                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card" id="ActivityElement">
                    <div class="card-header">
                        <h5 class="card-title">Activity</h5>


                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>


                        </div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="text-center">


                                <div class="row">



                                    <div class="col-md-2" style="text-align:center">
                                        <a href="<?php echo url('events-setup'); ?>"><img class="img-fluid" border="1"
                                                src="<?php echo url('assets/images/department.png'); ?>" style="max-width:80px"></a>
                                        <br />
                                        Events
                                    </div>
                                    <div class="col-md-2" style="text-align:center">
                                        <a href="<?php echo url('event-log'); ?>"><img class="img-fluid" border="0"
                                                src="<?php echo url('assets/images/quotation-View.png'); ?>" style="max-width:80px"></a>
                                        <br />
                                        Quotation Log
                                    </div>
                                    <div class="col-md-2" style="text-align:center">
                                        <a href="<?php echo url('quotation'); ?>"><img class="img-fluid" border="0"
                                                src="<?php echo url('assets/images/quotation-setup.png'); ?>" style="max-width:80px"></a>
                                        <br />
                                        Quotation Entry
                                    </div>
                                    <div class="col-md-2" style="text-align:center">
                                        <a href="<?php echo url('Vsn-Log'); ?>"><img class="img-fluid" border="0"
                                                src="<?php echo url('assets/images/qua.png'); ?>" style="max-width:80px"></a>
                                        <br />
                                        VSN Log
                                    </div>
                                    <div class="col-md-2" style="text-align:center">
                                        <a href="<?php echo url('Quote-log'); ?>"><img class="img-fluid" border="0"
                                                src="<?php echo url('assets/images/qua.png'); ?>" style="max-width:80px"></a>
                                        <br />
                                        Quote log
                                    </div>
                                    <div class="col-md-2" style="text-align:center">
                                        <a href="<?php echo url('OrderEntry'); ?>"><img class="img-fluid" border="0"
                                                src="<?php echo url('assets/images/order.png'); ?>" style="max-width:80px"></a>
                                        <br />
                                        Order Entry
                                    </div>
                                    <div class="col-md-2" style="text-align:center">
                                        <a href="<?php echo url('ChargeList-VSN'); ?>"><img class="img-fluid" border="0"
                                                src="<?php echo url('assets/images/chargelist.png'); ?>" style="max-width:80px"></a>
                                        <br />
                                        Charge List VSN
                                    </div>
                                    <div class="col-md-2" style="text-align:center">
                                        <a href="<?php echo url('purchase-order'); ?>"><img class="img-fluid" border="0"
                                                src="<?php echo url('assets/images/purchaseorder.png'); ?>" style="max-width:80px"></a>
                                        <br />
                                        Purchase Order
                                    </div>
                                    <div class="col-md-2" style="text-align:center">
                                        <a href="<?php echo url('Delivery-Order'); ?>"><img class="img-fluid" border="0"
                                                src="<?php echo url('assets/images/deliveryorder.png'); ?>" style="max-width:80px"></a>
                                        <br />
                                        Delivery Order
                                    </div>
                                    <div class="col-md-2" style="text-align:center">
                                        <a href="<?php echo url('Final-Invoice'); ?>"><img class="img-fluid" border="0"
                                                src="<?php echo url('assets/images/FinalInvoice.png'); ?>" style="max-width:80px"></a>
                                        <br />
                                        Final Invoice
                                    </div>
                                    <div class="col-md-2" style="text-align:center">
                                        <a href="<?php echo url('ShipServ'); ?>"><img class="img-fluid" border="0"
                                                src="<?php echo url('assets/images/FinalInvoice.png'); ?>" style="max-width:80px"></a>
                                        <br />
                                        Ship Serv
                                    </div>

                                </div>


                                </p>


                            </div>
                            <!-- /.col -->

                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- ./card-body -->

                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card" id="AccountsElement">
                    <div class="card-header">
                        <h5 class="card-title">Accounts</h5>


                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>


                        </div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="text-center">


                                <div class="row">



                                    <div class="col-md-2" style="text-align:center">

                                        <a href="<?php echo url('ChartOfAccount'); ?>"><img class="img-fluid" border="1"
                                                src="<?php echo url('assets/images/Chartaccount.png'); ?>" style="max-width:80px"></a>
                                        <br />
                                        Chart Of Account
                                    </div>
                                    <div class="col-md-2" style="text-align:center">

                                        <a href="<?php echo url('EmployeeRegistration'); ?>"><img class="img-fluid" border="1"
                                                src="<?php echo url('assets/images/emplyeereg.png'); ?>" style="max-width:80px"></a>
                                        <br />
                                        Employee Registraion
                                    </div>
                                    <div class="col-md-2" style="text-align:center">

                                        <a href="<?php echo url('VendorVoucher'); ?>"><img class="img-fluid" border="1"
                                                src="<?php echo url('assets/images/Vendorpaymentvoucher.png'); ?>" style="max-width:120px"></a>
                                        <br />
                                        Vendor Payment Voucher
                                    </div>
                                    <div class="col-md-2" style="text-align:center">

                                        <a href="<?php echo url('ReceiptVoucher'); ?>"><img class="img-fluid" border="1"
                                                src="<?php echo url('assets/images/RECEIPTVOUCHER.png'); ?>" style="max-width:120px"></a>
                                        <br />
                                        Receipt Voucher
                                    </div>
                                    <div class="col-md-2" style="text-align:center">

                                        <a href="<?php echo url('ExpensePaymentVoucher'); ?>"><img class="img-fluid" border="1"
                                                src="<?php echo url('assets/images/Expensevoucher.png'); ?>" style="max-width:120px"></a>
                                        <br />
                                        Expense Voucher
                                    </div>
                                    <div class="col-md-2" style="text-align:center">

                                        <a href="<?php echo url('BillInvoice'); ?>"><img class="img-fluid" border="1"
                                                src="<?php echo url('assets/images/invoice-icon.png'); ?>" style="max-width: 80px;height: 80px;"></a>
                                        <br />
                                        Bill Invoice
                                    </div>
                                    <div class="col-md-2" style="text-align:center">

                                        <a href="<?php echo url('IncomeBillInvoice'); ?>"><img class="img-fluid" border="1"
                                                src="<?php echo url('assets/images/invoice-icon.png'); ?>" style="max-width: 80px;height: 80px;"></a>
                                        <br />
                                        Income Bill Invoice
                                    </div>
                                    <div class="col-md-2" style="text-align:center">

                                        <a href="<?php echo url('Openingbalance'); ?>"><img class="img-fluid" border="1"
                                                src="<?php echo url('assets/images/openingbalance.png'); ?>" style="max-width: 80px;height: 80px;"></a>
                                        <br />
                                        Opening Balance
                                    </div>
                                    <div class="col-md-2" style="text-align:center">

                                        <a href="<?php echo url('journal-voucher'); ?>"><img class="img-fluid" border="1"
                                                src="<?php echo url('assets/images/RECEIPTVOUCHER.png'); ?>" style="max-width:120px"></a>
                                        <br />
                                        journal voucher
                                    </div>

                                    <div class="col-md-2" style="text-align:center">

                                        <a href="<?php echo url('Account-Ledger'); ?>"><img class="img-fluid" border="1"
                                                src="<?php echo url('assets/images/ledger.png'); ?>" style="max-width: 80px;height: 80px;"></a>
                                        <br />
                                        Account Ledger
                                    </div>
                                    <div class="col-md-2" style="text-align:center">

                                        <a href="<?php echo url('Pay-Roll'); ?>"><img class="img-fluid" border="1"
                                                src="<?php echo url('assets/images/payroll.png'); ?>" style="max-width: 80px;height: 80px;"></a>
                                        <br />
                                        Pay Roll
                                    </div>


                                </div>


                                </p>


                            </div>
                            <!-- /.col -->

                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- ./card-body -->

                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card" id="InventoryElement">
                    <div class="card-header">
                        <h5 class="card-title">Inventory</h5>


                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>


                        </div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="text-center">


                                <div class="row">



                                    <div class="col-md-2" style="text-align:center">

                                        <a href="<?php echo url('Stock-Product-List'); ?>"><img class="img-fluid" border="1"
                                                src="<?php echo url('assets/images/stitemreg.png'); ?>" style="max-width:80px"></a>
                                        <br />
                                        Stock Item Registration
                                    </div>
                                    <div class="col-md-2" style="text-align:center">

                                        <a href="<?php echo url('Opening-Stock'); ?>"><img class="img-fluid" border="1"
                                                src="<?php echo url('assets/images/OpeningStock.png'); ?>" style="max-width:80px"></a>
                                        <br />
                                        Opening Stock
                                    </div>
                                    <div class="col-md-2" style="text-align:center">

                                        <a href="<?php echo url('Stock-Purchase-Order'); ?>"><img class="img-fluid" border="1"
                                                src="<?php echo url('assets/images/stockpurchase.png'); ?>" style="max-width:80px"></a>
                                        <br />
                                        Stock Purchase Order
                                    </div>
                                    <div class="col-md-2" style="text-align:center">

                                        <a href="<?php echo url('Pull-Stock'); ?>"><img class="img-fluid" border="1"
                                                src="<?php echo url('assets/images/Pullstock.png'); ?>" style="max-width: 100px;height: 80px;"></a>
                                        <br />
                                        Pull Stock
                                    </div>
                                    <div class="col-md-2" style="text-align:center">

                                        <a href="<?php echo url('Stock-PO-Purchased'); ?>"><img class="img-fluid" border="1"
                                                src="<?php echo url('assets/images/stockpurchase.png'); ?>" style="max-width:80px"></a>
                                        <br />
                                        Stock PO Purchased
                                    </div>
                                    <div class="col-md-2" style="text-align:center">

                                        <a href="<?php echo url('Sale-Return'); ?>"><img class="img-fluid" border="1"
                                                src="<?php echo url('assets/images/SaleReturn.png'); ?>" style="max-width: 100px;height: 80px;"></a>
                                        <br />
                                        Sale Return
                                    </div>
                                    <div class="col-md-2" style="text-align:center">

                                        <a href="<?php echo url('Stock-Transfer'); ?>"><img class="img-fluid" border="1"
                                                src="<?php echo url('assets/images/Stocktranfer.png'); ?>" style="max-width: 100px;height: 100px;"></a>
                                        <br />
                                        Stock Transfer
                                    </div>
                                    <div class="col-md-2" style="text-align:center">

                                        <a href="<?php echo url('Current-Stock-Position'); ?>"><img class="img-fluid" border="1"
                                                src="<?php echo url('assets/images/Currentstockposition.png'); ?>" style="max-width: 100px;height: 100px;"></a>
                                        <br />
                                        Current Stock Position
                                    </div>
                                    <div class="col-md-2" style="text-align:center">

                                        <a href="<?php echo url('Stock-Ledger'); ?>"><img class="img-fluid" border="1"
                                                src="<?php echo url('assets/images/stledger.png'); ?>" style="max-width: 100px;height: 100px;"></a>
                                        <br />
                                        Stock Ledger
                                    </div>



                                </div>


                                </p>


                            </div>
                            <!-- /.col -->

                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- ./card-body -->

                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card" id="ReportsElement">
                    <div class="card-header">
                        <h5 class="card-title">Reports</h5>


                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>


                        </div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="text-center">


                                <div class="row">



                                    <div class="col-md-2" style="text-align:center">

                                        <a href="<?php echo url('TrialBalance'); ?>"><img class="img-fluid" border="1"
                                                src="<?php echo url('assets/images/Chart.png'); ?>" style="max-width: 80px;height: 80px;"></a>
                                        <br />
                                        Trial Balance Report
                                    </div>
                                    <div class="col-md-2" style="text-align:center">
                                        <a href="<?php echo url('Order-Report'); ?>"><img class="img-fluid" border="0"
                                                src="<?php echo url('assets/images/Chart.png'); ?>" style="max-width:80px"></a>
                                        <br />
                                        Order Report
                                    </div>
                                    <div class="col-md-2" style="text-align:center">
                                        <a href="<?php echo url('Order-Report'); ?>"><img class="img-fluid" border="0"
                                                src="<?php echo url('assets/images/Chart.png'); ?>" style="max-width:80px"></a>
                                        <br />
                                        DMMissing-Report
                                    </div>
                                    <div class="col-md-2" style="text-align:center">
                                        <a href="<?php echo url('Order-Report'); ?>"><img class="img-fluid" border="0"
                                                src="<?php echo url('assets/images/Chart.png'); ?>" style="max-width:80px"></a>
                                        <br />
                                        Invoice-Report
                                    </div>
                                    <div class="col-md-2" style="text-align:center">
                                        <a href="<?php echo url('RFQ-C-Summary'); ?>"><img class="img-fluid" border="0"
                                                src="<?php echo url('assets/images/Chart.png'); ?>" style="max-width:80px"></a>
                                        <br />
                                        RFQ-Cus-Sum-Report
                                    </div>
                                    <div class="col-md-2" style="text-align:center">
                                        <a href="<?php echo url('RFQVesselSummary'); ?>"><img class="img-fluid" border="0"
                                                src="<?php echo url('assets/images/Chart.png'); ?>" style="max-width:80px"></a>
                                        <br />
                                        RFQ-Ves-Sum-Report
                                    </div>


                                </div>
                                <div class="row">



                                    <div class="col-md-2" style="text-align:center">

                                        <a href="<?php echo url('Po-Received-Report'); ?>"><img class="img-fluid" border="1"
                                                src="<?php echo url('assets/images/Chart.png'); ?>" style="max-width: 80px;height: 80px;"></a>
                                        <br />
                                        Po Received Report
                                    </div>
                                    <div class="col-md-2" style="text-align:center">
                                        <a href="<?php echo url('PO-Not-Received'); ?>"><img class="img-fluid" border="0"
                                                src="<?php echo url('assets/images/Chart.png'); ?>" style="max-width:80px"></a>
                                        <br />
                                        PO Not Received
                                    </div>
                                    <div class="col-md-2" style="text-align:center">
                                        <a href="<?php echo url('ReturnItemReport'); ?>"><img class="img-fluid" border="0"
                                                src="<?php echo url('assets/images/Chart.png'); ?>" style="max-width:80px"></a>
                                        <br />
                                        Return Item Report
                                    </div>
                                    <div class="col-md-2" style="text-align:center">
                                        <a href="<?php echo url('Net-Profit-Report'); ?>"><img class="img-fluid" border="0"
                                                src="<?php echo url('assets/images/Chart.png'); ?>" style="max-width:80px"></a>
                                        <br />
                                        Net Profit Report
                                    </div>
                                    <div class="col-md-2" style="text-align:center">
                                        <a href="<?php echo url('AVI-Rebate-Report'); ?>"><img class="img-fluid" border="0"
                                                src="<?php echo url('assets/images/Chart.png'); ?>" style="max-width:80px"></a>
                                        <br />
                                        AVI Rebate Report
                                    </div>
                                    <div class="col-md-2" style="text-align:center">
                                        <a href="<?php echo url('Daily-Quotation-Report'); ?>"><img class="img-fluid" border="0"
                                                src="<?php echo url('assets/images/Chart.png'); ?>" style="max-width:80px"></a>
                                        <br />
                                        Daily Quotation Report
                                    </div>


                                </div>
                                <div class="row">



                                    <div class="col-md-2" style="text-align:center">

                                        <a href="<?php echo url('Max Purchase Item Report'); ?>"><img class="img-fluid" border="1"
                                                src="<?php echo url('assets/images/Chart.png'); ?>" style="max-width: 80px;height: 80px;"></a>
                                        <br />
                                        Max-Purchase-Item-Report
                                    </div>
                                    <div class="col-md-2" style="text-align:center">
                                        <a href="<?php echo url('Purchase-Return-Report'); ?>"><img class="img-fluid" border="0"
                                                src="<?php echo url('assets/images/Chart.png'); ?>" style="max-width:80px"></a>
                                        <br />
                                        Purchase Return Report
                                    </div>
                                    <div class="col-md-2" style="text-align:center">
                                        <a href="{{route('MonthWiseNetProfitReport')}}"><img class="img-fluid" border="0"
                                                src="<?php echo url('assets/images/Chart.png'); ?>" style="max-width:80px"></a>
                                        <br />
                                        MonthWise NetProfit Report
                                    </div>
                                    <div class="col-md-2" style="text-align:center">
                                        <a href="{{route('MonthWiseQuoteReport')}}"><img class="img-fluid" border="0"
                                                src="<?php echo url('assets/images/Chart.png'); ?>" style="max-width:80px"></a>
                                        <br />
                                        MonthWise Quote Report
                                    </div>
                                    <div class="col-md-2" style="text-align:center">
                                        <a href="{{route('MonthQuoteSuccessCustomerWiseReport')}}"><img class="img-fluid" border="0"
                                                src="<?php echo url('assets/images/Chart.png'); ?>" style="max-width:80px"></a>
                                        <br />
                                        MonthWise QuoteSuccess Customer Report
                                    </div>
                                    <div class="col-md-2" style="text-align:center">
                                        <a href="{{route('YearlyQuotationReport')}}"><img class="img-fluid" border="0"
                                                src="<?php echo url('assets/images/Chart.png'); ?>" style="max-width:80px"></a>
                                        <br />
                                        Yearly Quotation Report
                                    </div>
                                    <div class="col-md-2" style="text-align:center">
                                        <a href="{{route('YearlySaleReport')}}"><img class="img-fluid" border="0"
                                                src="<?php echo url('assets/images/Chart.png'); ?>" style="max-width:80px"></a>
                                        <br />
                                        Yearly Sale Report
                                    </div>

                                </div>

                                </p>


                            </div>
                            <!-- /.col -->

                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- ./card-body -->

                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card" id="SecurityElement">
                    <div class="card-header">
                        <h5 class="card-title">Security</h5>


                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>


                        </div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="text-center">


                                <div class="row">



                                    <div class="col-md-2" style="text-align:center">

                                        <a href="<?php echo url('User-Rights'); ?>"><img class="img-fluid" border="1"
                                                src="<?php echo url('assets/images/userrights.png'); ?>" style="max-width: 80px;height: 80px;"></a>
                                        <br />
                                        User Rights
                                    </div>
                                    <div class="col-md-2" style="text-align:center">
                                        <a href="<?php echo url('User-Add-Delete'); ?>"><img class="img-fluid" border="0"
                                                src="<?php echo url('assets/images/user_add_delete.png'); ?>" style="max-width:80px"></a>
                                        <br />
                                        User Add / Delete
                                    </div>



                                </div>


                                </p>


                            </div>
                            <!-- /.col -->

                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- ./card-body -->

                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>

    </div>

    {{-- <script>
     var allTableData = document.getElementById("eventtable");
//    var totalNumbeOfRows = allTableData.rows.length;
   var tbodyRowCount = allTableData.tBodies[0].rows.length;
   console.log("Tbody is"+tbodyRowCount);
   document.getElementById("counte").innerHTML = tbodyRowCount;

//    var inputF = document.getElementById("counte");
            //   inputF.text = tbodyRowCount;
                // inputF.value = tbodyRowCount;
</script> --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="{{ url('/vendor/chart.js/Chart.min.js') }}"></script>
    <script>



function FillUserRights(UserRights){
    if (UserRights.ChkMenuStrip) {
        $('#MenuStrip1').show();
    } else {
        $('#MenuStrip1').hide();
    }
    if (UserRights.ChkPOReceivedLog) {
        $('#CmdPurchaseOrderLOG').show();
    } else {
        $('#CmdPurchaseOrderLOG').hide();
    }
    if (UserRights.ChkClientComplain) {
        $('#CmdClientComplain').show();
    } else {
        $('#CmdClientComplain').hide();
    }
    if (UserRights.ChkClientComplainReport) {
        $('#CmdClientComplainReport').show();
    } else {
        $('#CmdClientComplainReport').hide();
    }
    if (UserRights.ChkRating) {
        $('#CmdRating').show();
    } else {
        $('#CmdRating').hide();
    }
    if (UserRights.ChkComplainReport) {
        $('#CmdComplainReport').show();
    } else {
        $('#CmdComplainReport').hide();
    }
    if (UserRights.ChkComplainRegister) {
        $('#CmdComplainRegister').show();
    } else {
        $('#CmdComplainRegister').hide();
    }
    if (UserRights.ChkKPI) {
        $('#BtnKPI').show();
    } else {
        $('#BtnKPI').hide();
    }
    if (UserRights.ChkMonthWiseNetProfit) {
        $('#CmdMonthNetProfit').show();
    } else {
        $('#CmdMonthNetProfit').hide();
    }
    if (UserRights.ChkMissingSaleItem) {
        $('#CmdMissingItemSaleReport').show();
    } else {
        $('#CmdMissingItemSaleReport').hide();
    }
    if (UserRights.ChkPOPurchaseStatusReport) {
        $('#CmdStatusPoReport').show();
    } else {
        $('#CmdStatusPoReport').hide();
    }
    if (UserRights.ChkMonthWiseQuoteReport) {
        $('#CmdMonthWiseQuote').show();
    } else {
        $('#CmdMonthWiseQuote').hide();
    }
    if (UserRights.ChkQuotationLogExcluded) {
        $('#CmdQuotationLogExcluded').show();
    } else {
        $('#CmdQuotationLogExcluded').hide();
    }
    if (UserRights.ChkPOLog) {
        $('#Button74').show();
    } else {
        $('#Button74').hide();
    }
    if (UserRights.ChkExcelUpdatePrice) {
        $('#CmdExcelUpdatePrice').show();
    } else {
        $('#CmdExcelUpdatePrice').hide();
    }
    if (UserRights.ChkMoveToStock) {
        $('#CmdMoveToStock').show();
    } else {
        $('#CmdMoveToStock').hide();
    }
    if (UserRights.ChkDMReturnToVendor) {
        $('#CmdReturnToVendor').show();
    } else {
        $('#CmdReturnToVendor').hide();
    }
    if (UserRights.ChkFillReport) {
        $('#CmdNotDeliveredForm').show();
    } else {
        $('#CmdNotDeliveredForm').hide();
    }
    if (UserRights.ChkDmMissingReport) {
        $('#Button72').show();
    } else {
        $('#Button72').hide();
    }
    if (UserRights.ChkPONotDeliveredRpt) {
        $('#BTNPoNotDlv').show();
    } else {
        $('#BTNPoNotDlv').hide();
    }
    if (UserRights.ChkFillNotDeliveredRpt) {
        $('#BTNFillNotDlv').show();
    } else {
        $('#BTNFillNotDlv').hide();
    }
    if (UserRights.ChkFillReportVSNWise) {
        $('#BTNFillVSNWise').show();
    } else {
        $('#BTNFillVSNWise').hide();
    }
    if (UserRights.ChkDMMissing) {
        $('#CmdDMMissing').show();
    } else {
        $('#CmdDMMissing').hide();
    }
    if (UserRights.ChkWebBrowser) {
        $('#CmdWebBrowser').show();
    } else {
        $('#CmdWebBrowser').hide();
    }
    if (UserRights.ChkPDfToText) {
        $('#CmdPdfToTxt').show();
    } else {
        $('#CmdPdfToTxt').hide();
    }
    if (UserRights.ChkShipServData) {
        $('#CmdShipServ').show();
    } else {
        $('#CmdShipServ').hide();
    }
    if (UserRights.ChkPOPurcReturn) {
        $('#CmdPOPurcReturn').show();
    } else {
        $('#CmdPOPurcReturn').hide();
    }
    if (UserRights.BranchSetup) {
        $('#CmdBranchsetup').show();
        $('#BranchSetup').show();
    } else {
        $('#CmdBranchsetup').hide();
        $('#BranchSetup').hide();
    }
    if (UserRights.CompanySetup) {
        $('#CmdCompanySetup').show();
        $('#ChkCompanySetup').show();
    } else {
        $('#CmdCompanySetup').hide();
        $('#ChkCompanySetup').hide();
    }
    if (UserRights.VesselSetup) {
        $('#CmdVesselRegSetup').show();
        $('#VesselRegistation').show();
    } else {
        $('#CmdVesselRegSetup').hide();
        $('#VesselRegistation').hide();
    }
    if (UserRights.CustomerSetup) {
        $('#CmdCustomerSetup').show();
        $('#CustomerSetup').show();
    } else {
        $('#CmdCustomerSetup').hide();
        $('#CustomerSetup').hide();
    }
    if (UserRights.VendorSetup) {
        $('#CmdVendorSetup').show();
        $('#VendorRegistration').show();
    } else {
        $('#CmdVendorSetup').hide();
        $('#VendorRegistration').hide();
    }
    if (UserRights.DepartmentSetup) {
        $('#CmdDepartmentSetup').show();
        $('#ProductDepartmentToolStripMenuItem').show();
    } else {
        $('#CmdDepartmentSetup').hide();
        $('#ProductDepartmentToolStripMenuItem').hide();
    }
    if (UserRights.CategorySetup) {
        $('#CmdCategorySetup').show();
        $('#ProductCategoryToolStripMenuItem').show();
    } else {
        $('#CmdCategorySetup').hide();
        $('#ProductCategoryToolStripMenuItem').hide();
    }
    if (UserRights.OriginSetup) {
        $('#CmdOriginSetup').show();
        $('#OriToolStripMenuItem').show();
    } else {
        $('#CmdOriginSetup').hide();
        $('#OriToolStripMenuItem').hide();
    }
    if (UserRights.IMPARegistration) {
        $('#CmdImpaReg').show();
        $('#ProductRegistrationToolStripMenuItem').show();
    } else {
        $('#CmdImpaReg').hide();
        $('#ProductRegistrationToolStripMenuItem').hide();
    }
    if (UserRights.VendorProduct) {
        $('#CmdVendorProducts').show();
        $('#VendorProductRegistration').show();
    } else {
        $('#CmdVendorProducts').hide();
        $('#VendorProductRegistration').hide();
    }
    if (UserRights.ImportProductList) {
        $('#CmdImportProductList').show();
        $('#ImportProductsToolStripMenuItem').show();
    } else {
        $('#CmdImportProductList').hide();
        $('#ImportProductsToolStripMenuItem').hide();
    }
    if (UserRights.SendListToVendor) {
        $('#CmdSendList').show();
        $('#SendListToolStripMenuItem').show();
    } else {
        $('#CmdSendList').hide();
        $('#SendListToolStripMenuItem').hide();
    }
    if (UserRights.ChkAgentRegistration) {
        $('#CmdAgentRegistration').show();
    } else {
        $('#CmdAgentRegistration').hide();
    }
    if (UserRights.UpdateVendorPrice) {
        $('#CmdUpdateVendorPrice').show();
        $('#UpdateVendorPriceToolStripMenuItem3').show();
    } else {
        $('#CmdUpdateVendorPrice').hide();
        $('#UpdateVendorPriceToolStripMenuItem3').hide();
    }
    if (UserRights.SendProductListToVessel) {
        $('#CmdSendListVessele').show();
        $('#SendListToVesselToolStripMenuItem').show();
    } else {
        $('#CmdSendListVessele').hide();
        $('#SendListToVesselToolStripMenuItem').hide();
    }
    if (UserRights.ChkShipVipSetup) {
        $('#Button7').show();
        $('#Button8').show();
    } else {
        $('#Button7').hide();
        $('#Button8').hide();
    }
    if (UserRights.ChkLocationSetup) {
        $('#Button9').show();
        $('#GodownRegistrationToolStripMenuItem').show();
    } else {
        $('#Button9').hide();
        $('#GodownRegistrationToolStripMenuItem').hide();
    }
    if (UserRights.ChkPrioritySetup) {
        $('#Button26').show();
    } else {
        $('#Button26').hide();
    }
    if (UserRights.ChkSearchAgent) {
        $('#Button24').show();
    } else {
        $('#Button24').hide();
    }
    if (UserRights.ChkQuoteStatus) {
        $('#CmdStatusSetup').show();
    } else {
        $('#CmdStatusSetup').hide();
    }
    if (UserRights.TermsSetup) {
        $('#CmdTermsSetup').show();
    } else {
        $('#CmdTermsSetup').hide();
    }
    if (UserRights.ChkAssignUserColour) {
        $('#CmdAssignUserColors').show();
    } else {
        $('#CmdAssignUserColors').hide();
    }
    if (UserRights.ChkBankDetailRegistration) {
        $('#ToolStripMenuItem20').show();
    } else {
        $('#ToolStripMenuItem20').hide();
    }
    if (UserRights.ChkFixAccountSetup) {
        $('#ToolStripMenuItem8').show();
    } else {
        $('#ToolStripMenuItem8').hide();
    }
    if (UserRights.ChkVSNLog) {
        $('#Button2').show();
    } else {
        $('#Button2').hide();
    }

    $('#CmdVendorGridRec').css('display', UserRights.ChkVendorRecon ? 'block' : 'none');
    $('#BtnUserPerformance').css('display', UserRights.ChkUserPerformance ? 'block' : 'none');
    $('#CmdCustomerGridRecon').css('display', UserRights.ChkCustomerRecon ? 'block' : 'none');
    $('#CmdIMPAWiseVendor').css('display', UserRights.IMPAWiseVendor ? 'block' : 'none');
    $('#Button76').css('display', UserRights.ChkProvisionContract ? 'block' : 'none');
    $('#CmdCustomerContract').css('display', UserRights.SalesManSetup ? 'block' : 'none');
    $('#CmdSalesManSetup').css('display', UserRights.ChkCustomerContract ? 'block' : 'none');
    $('#CmdFlipToVSN').css('display', UserRights.ChkFilp ? 'block' : 'none');
    $('#Button31').css('display', UserRights.ChkOrderList ? 'block' : 'none');
    $('#Button10').css('display', UserRights.ChkPoReceived ? 'block' : 'none');
    $('#CmdDeliveryOrder').css('display', UserRights.ChkDeliveryOrder ? 'block' : 'none');
    $('#CmdSendListToVendor').css('display', UserRights.SendListToVendor ? 'block' : 'none');
    $('#CmdQuotationLog').css('display', UserRights.QuotationLog ? 'block' : 'none');
    $('#QuotationLog').css('display', UserRights.QuotationLog ? 'block' : 'none');
    $('#CmdCreateEvent').css('display', UserRights.CreateEvent ? 'block' : 'none');
    $('#CreateEvent').css('display', UserRights.CreateEvent ? 'block' : 'none');
    $('#CmdQuotation').css('display', UserRights.Quotation ? 'block' : 'none');
    $('#Quotation').css('display', UserRights.Quotation ? 'block' : 'none');
    $('#CmdImpaListImport').css('display', UserRights.IMPAListImport ? 'block' : 'none');
    $('#ImportDataToolStripMenuItem1').css('display', UserRights.IMPAListImport ? 'block' : 'none');
    $('#CmdVesseleLog').css('display', UserRights.VesselLog ? 'block' : 'none');
    $('#VesselHistoryLogToolStripMenuItem').css('display', UserRights.VesselLog ? 'block' : 'none');
    $('#Button6').css('display', UserRights.ChkRFQ ? 'block' : 'none');
    $('#Button17').css('display', UserRights.ChkPullStock ? 'block' : 'none');
    $('#Button23').css('display', UserRights.ChkQuatationPriorityLog ? 'block' : 'none');
    $('#Button3').css('display', UserRights.ChkChargesOrderForm ? 'block' : 'none');
    $('#Button5').css('display', UserRights.ChkPurchaseBuyOut ? 'block' : 'none');
    $('#Button4').css('display', UserRights.ChkChargeQoute ? 'block' : 'none');



}


$(document).ready(function () {
//     var header = $(".fixed-header");
// var cardBody = $(".fixedcard-body");
// var headerOffset = header.offset().top;

// function isMobileDevice() {
//     return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
// }

// if (!isMobileDevice()) {
//     $(window).scroll(function() {
//         if ($(window).scrollTop() > headerOffset) {
//             header.css({ position: "fixed", top: "0", width: '94.5%' });
//             cardBody.css({ paddingTop: header.height() + "px" });
//         } else {
//             header.css({ position: "absolute", top: "0", width: '100%' });
//             cardBody.css({ paddingTop: "120px" });
//         }
//     });
// }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: '/indexload',
        type: 'POST',
        data: {
        },
        beforeSend: function() {
            // Show the overlay and spinner before sending the request
            $('.overlay').show();
        },
        success: function(resposne) {
            console.log(resposne);
            if (resposne.UserRights) {
                
                FillUserRights(resposne.UserRights);
            }
            $('#counte').text(resposne.QuotationCount);
            $('#VSNLogcount').text(resposne.VSNLogcount);
            $('#OrderCount').text(resposne.OrderCount);
            $('#OrderReceviedCount').text(resposne.OrderReceviedCount);
            $('#invoicesReceviedCount').text(resposne.invoicesReceviedCount);
            $('#pInvoice').text(resposne.Invoice);
            $('#ItemStockCount').text(resposne.ItemStockCount);
            var data = resposne.Allorder;
            var table = document.getElementById('allordertablebody');
            data.forEach(function(item) {
                let row = table.insertRow();
                function createCell(content) {
                    let cell = row.insertCell();
                    cell.innerHTML = content;
                    return cell;
                }
                createCell(item.Vsn.VSNNo);
                createCell(item.Orders.CustomerName);
                createCell(item.Orders.VesselName);
                let badge = createCell('');
                badge.innerHTML = '<span class="badge ' + (item.Orders.Status === "ORDER RECEIVED" ? "badge-success" : "badge-info") + '">' + item.Orders.Status + '</span>';
                createCell(parseFloat(item.Orders.ExtAmount).toFixed(2));
            });
            // if (resposne.TOTALREVENUE) {
                $('#TOTALREVENUE').text('$'+ parseFloat(resposne.TOTALREVENUE).toFixed(2));
                $('#TOTALCOST').text('$'+ parseFloat(Math.abs(resposne.TOTALCOST)).toFixed(2));
                $('#TOTALPROFIT').text('$'+ parseFloat(resposne.TOTALPROFIT).toFixed(2));
                $('#TotalTransaction').text(resposne.transCount);
                $('#ItemStockCount').text(resposne.STOCK);
            // }
        },

        error: function(data) {

            console.log(data);
            $('.overlay').hide();
        },
        complete: function() {
            $('.overlay').hide();
            // Hide the overlay and spinner after the request is complete
        }
    });
});







$(document).ready(function() {



  $("#SetupsButton").click(function() {
    var target = $("#SetupsElement");
    $("html, body").animate({
      scrollTop: target.offset().top - 130
    }, 1000); // Adjust the scroll duration as needed
  });
  $("#ActivityButton").click(function() {
    var target = $("#ActivityElement");
    $("html, body").animate({
      scrollTop: target.offset().top - 130
    }, 1000); // Adjust the scroll duration as needed
  });
  $("#AccountsButton").click(function() {
    var target = $("#AccountsElement");
    $("html, body").animate({
      scrollTop: target.offset().top - 130
    }, 1000); // Adjust the scroll duration as needed
  });
  $("#InventoryButton").click(function() {
    var target = $("#InventoryElement");
    $("html, body").animate({
      scrollTop: target.offset().top - 130
    }, 1000); // Adjust the scroll duration as needed
  });
  $("#ReportsButton").click(function() {
    var target = $("#ReportsElement");
    $("html, body").animate({
      scrollTop: target.offset().top - 130
    }, 1000); // Adjust the scroll duration as needed
  });
  $("#SecurityButton").click(function() {
    var target = $("#SecurityElement");
    $("html, body").animate({
      scrollTop: target.offset().top - 130
    }, 1000); // Adjust the scroll duration as needed
  });
});


        $(function() {
            'use strict'

            /* ChartJS
             * -------
             * Here we will create a few charts using ChartJS
             */

            //-----------------------
            // - MONTHLY SALES CHART -
            //-----------------------

            // Get context with jQuery - using jQuery's .get() method.
            var salesChartCanvas = $('#salesChart').get(0).getContext('2d')

            var salesChartData = {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                        label: 'Digital Goods',
                        backgroundColor: 'rgba(60,141,188,0.9)',
                        borderColor: 'rgba(60,141,188,0.8)',
                        pointRadius: false,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(60,141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data: [28, 48, 40, 19, 86, 27, 90]
                    },
                    {
                        label: 'Electronics',
                        backgroundColor: 'rgba(210, 214, 222, 1)',
                        borderColor: 'rgba(210, 214, 222, 1)',
                        pointRadius: false,
                        pointColor: 'rgba(210, 214, 222, 1)',
                        pointStrokeColor: '#c1c7d1',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        data: [65, 59, 80, 81, 56, 55, 40]
                    }
                ]
            }

            var salesChartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            display: false
                        }
                    }]
                }
            }

            // This will get the first returned node in the jQuery collection.
            // eslint-disable-next-line no-unused-vars
            var salesChart = new Chart(salesChartCanvas, {
                type: 'line',
                data: salesChartData,
                options: salesChartOptions
            })
        });
        //---------------------------
        // - END MONTHLY SALES CHART -
        //---------------------------

        var ticksStyle = {
            fontColor: '#495057',
            fontStyle: 'bold'
        }

        var mode = 'index'
        var intersect = true

        var $salesChart = $('#sales-chart')
        // eslint-disable-next-line no-unused-vars
        var salesChart = new Chart($salesChart, {
            type: 'bar',
            data: {
                labels: ['JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
                datasets: [{
                        backgroundColor: '#007bff',
                        borderColor: '#007bff',
                        data: [1000, 2000, 3000, 2500, 2700, 2500, 3000]
                    },
                    {
                        backgroundColor: '#ced4da',
                        borderColor: '#ced4da',
                        data: [700, 1700, 2700, 2000, 1800, 1500, 2000]
                    }
                ]
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    mode: mode,
                    intersect: intersect
                },
                hover: {
                    mode: mode,
                    intersect: intersect
                },
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        // display: false,
                        gridLines: {
                            display: true,
                            lineWidth: '4px',
                            color: 'rgba(0, 0, 0, .2)',
                            zeroLineColor: 'transparent'
                        },
                        ticks: $.extend({
                            beginAtZero: true,

                            // Include a dollar sign in the ticks
                            callback: function(value) {
                                if (value >= 1000) {
                                    value /= 1000
                                    value += 'k'
                                }

                                return '$' + value
                            }
                        }, ticksStyle)
                    }],
                    xAxes: [{
                        display: true,
                        gridLines: {
                            display: false
                        },
                        ticks: ticksStyle
                    }]
                }
            }
        });

        var $visitorsChart = $('#visitors-chart')
        // eslint-disable-next-line no-unused-vars
        var visitorsChart = new Chart($visitorsChart, {
            data: {
                labels: ['18th', '20th', '22nd', '24th', '26th', '28th', '30th'],
                datasets: [{
                        type: 'line',
                        data: [100, 120, 170, 167, 180, 177, 160],
                        backgroundColor: 'transparent',
                        borderColor: '#007bff',
                        pointBorderColor: '#007bff',
                        pointBackgroundColor: '#007bff',
                        fill: false
                        // pointHoverBackgroundColor: '#007bff',
                        // pointHoverBorderColor    : '#007bff'
                    },
                    {
                        type: 'line',
                        data: [60, 80, 70, 67, 80, 77, 100],
                        backgroundColor: 'tansparent',
                        borderColor: '#ced4da',
                        pointBorderColor: '#ced4da',
                        pointBackgroundColor: '#ced4da',
                        fill: false
                        // pointHoverBackgroundColor: '#ced4da',
                        // pointHoverBorderColor    : '#ced4da'
                    }
                ]
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    mode: mode,
                    intersect: intersect
                },
                hover: {
                    mode: mode,
                    intersect: intersect
                },
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        // display: false,
                        gridLines: {
                            display: true,
                            lineWidth: '4px',
                            color: 'rgba(0, 0, 0, .2)',
                            zeroLineColor: 'transparent'
                        },
                        ticks: $.extend({
                            beginAtZero: true,
                            suggestedMax: 200
                        }, ticksStyle)
                    }],
                    xAxes: [{
                        display: true,
                        gridLines: {
                            display: false
                        },
                        ticks: ticksStyle
                    }]
                }
            }
        });
    </script>
@endsection
