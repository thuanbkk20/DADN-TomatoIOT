<!--<div style="width:70%;float:right">-->
<!--    --><?php
//        echo '<pre>';print_r($historyArr);echo '</pre>';
//    ?>
<!--</div>-->

<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Lịch sử</h1>
                </div>
                <div class="col-auto">
                    <div class="page-utilities">
                        <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                            <div class="col-auto">
                                <form class="table-search-form row gx-1 align-items-center">
                                    <div class="col-auto">
                                        <input type="text" id="search-orders" name="searchorders" class="form-control search-orders" placeholder="Search">
                                    </div>
                                    <div class="col-auto">
                                        <button class="btn app-btn-secondary">Search</button>
                                    </div>
                                </form>

                            </div><!--//col-->
                            <div class="col-auto">
                                <select class="form-select w-auto" >
                                    <option selected value="option-1">Tất cả</option>
                                    <option value="option-2">Hôm nay</option>
                                    <option value="option-3">7 ngày</option>
                                    <option value="option-4">30 ngày</option>
                                </select>
                            </div>
                        </div><!--//row-->
                    </div><!--//table-utilities-->
                </div><!--//col-auto-->
            </div><!--//row-->

            <div class="tab-content" id="orders-table-tab-content">
                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                    <div class="app-card app-card-orders-table shadow-sm mb-5">
                        <div class="app-card-body">
                            <div class="table-responsive">
                                <table class="table app-table-hover mb-0 text-left">
                                    <thead>
                                    <tr>
                                        <th class="cell col col-3">Thời gian</th>
                                        <th class="cell col col-8">Nội dung</th>
                                        <th class="cell col col-1"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($historyArr as $each): ?>
                                    <tr>
                                        <td class="cell"><span class="cell-data"><?php echo $each['time'] ?></span></td>
                                        <td class="cell"><span class="truncate"><?php echo $each['description'] ?></span></td>
                                        <td class="cell"><a role="button" class="btn-sm app-btn-secondary"
                                                            data-bs-toggle="modal" data-bs-target="#viewNotifyModal<?php echo $each['id']?>">Xem</a></td>
                                    </tr>
                                        <div class="modal fade" id="viewNotifyModal<?php echo $each['id']?>" tabindex="-1"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true" aria-modal="true" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body">
					                                    <?php echo $each['description'] ?>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div><!--//table-responsive-->

                        </div><!--//app-card-body-->
                    </div><!--//app-card-->
                    <div class="text-end my-3 mx-3">
                        <?php
                            if(isset($curPage) && (int)$curPage > 1){
                            echo "<a class='text-decoration-none mx-2 num-page' href='"._WEB_ROOT."/history?page=".($curPage-1)."'>Previous</a>";
                            }else{
                            echo "<a class='text-decoration-none mx-2 num-page disabled'>Previous</a>";
                            }
                            for($page = 1; $page <= $number_of_page; $page++) {
                                if(isset($curPage) && ((int)$curPage > $page -3 && (int)$curPage < $page +3)){
                                    if(isset($curPage) && (int)$curPage === $page){
                                        echo "<strong><a class='text-decoration-none num-page mx-2'>".$page."</a></strong>";
                                    } else{
                                        echo "<a class='text-decoration-none mx-2 num-page' href='"._WEB_ROOT."/history?page=".$page."'>".$page."</a>";
                                    }
                                }
                            }
                            if(isset($curPage) && (int)$curPage < $number_of_page){
                            echo "<a class='text-decoration-none mx-2 num-page' href='"._WEB_ROOT."/history?page=".($curPage+1)."'>Next</a>";
                            }else{
                            echo "<a class='text-decoration-none mx-2 num-page disabled'>Next</a>";
                            }
                        ?>
                    </div>
                    <!-- <nav class="app-pagination">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>//app-pagination -->
                </div><!--//tab-pane-->
            </div>
        </div><!--//container-fluid-->
    </div><!--//app-content-->
</div>