<!-- Set title -->
<title><?=
	!empty($page_title)?$page_title:"No name"
	?></title>

<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row mb-4 justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title">Độ ẩm đất</h1>
                </div>
                <div class="col-auto">
                    <a role="button" class="btn btn-danger mb-2 float-end" href=<?php echo _WEB_ROOT."/home/manual";?>>
                        Chỉnh tay
                    </a>
                </div>
            </div>
        </div>
        <div class="container-xl">
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">
                        <table class="table app-table-hover mb-0 text-start">
                            <thead>
                            <tr>
                                <th class="cell col col-7">Khu vực</th>
                                <th class="cell col col-2">Độ ẩm</th>
                                <th class="cell col col-3">Trạng thái máy bơm</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="cell">Khu vực 1</td>
                                <td class="cell">72</td>
                                <td class="cell">
                                    Tắt
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>