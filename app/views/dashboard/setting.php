<!-- Set title -->
<title><?=
    !empty($page_title)?$page_title:"No name"
?></title>

<div class="app-wrapper">    
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl row">
            <h1 class="app-page-title">Cài đặt sensor</h1>
            <div class="g-4 settings-section col-12 col-md-6">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="app-card-header">
                        <h3 class="section-title">Cảm biến độ ẩm đất</h3>
                    </div>
                    <div class="app-card-body">
                        <form class="settings-form">
                            <div class="mb-3">
                                <label for="setting-input-1" class="form-label">Ngưỡng trên</label>
                                <input type="text" class="form-control" id="setting-input-1" value="80">
                            </div>
                            <div class="mb-3">
                                <label for="setting-input-2" class="form-label">Ngưỡng dưới</label>
                                <input type="text" class="form-control" id="setting-input-2" value="60">
                            </div>
                            <button type="submit" class="btn app-btn-primary" >Save Changes</button>
                        </form>
                    </div><!--//app-card-body-->
                </div><!--//app-card-->
            </div><!--//row-->
            <div class="g-4 settings-section col-12 col-md-6">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="app-card-header">
                        <h3 class="section-title">Cảm biến độ ẩm không khí</h3>
                    </div>
                    <div class="app-card-body">
                        <form class="settings-form">
                            <div class="mb-3">
                                <label for="setting-input-1" class="form-label">Ngưỡng trên</label>
                                <input type="text" class="form-control" id="setting-input-1" value="80">
                            </div>
                            <div class="mb-3">
                                <label for="setting-input-2" class="form-label">Ngưỡng dưới</label>
                                <input type="text" class="form-control" id="setting-input-2" value="60">
                            </div>
                            <button type="submit" class="btn app-btn-primary" >Save Changes</button>
                        </form>
                    </div><!--//app-card-body-->
                </div><!--//app-card-->
            </div><!--//row-->
            <div class="g-4 settings-section col-12 col-md-6">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="app-card-header">
                        <h3 class="section-title">Cảm biến nhiệt độ</h3>
                    </div>
                    <div class="app-card-body">
                        <form class="settings-form">
                            <div class="mb-3">
                                <label for="setting-input-1" class="form-label">Ngưỡng trên</label>
                                <input type="text" class="form-control" id="setting-input-1" value="26">
                            </div>
                            <div class="mb-3">
                                <label for="setting-input-2" class="form-label">Ngưỡng dưới</label>
                                <input type="text" class="form-control" id="setting-input-2" value="21">
                            </div>
                            <button type="submit" class="btn app-btn-primary" >Save Changes</button>
                        </form>
                    </div><!--//app-card-body-->
                </div><!--//app-card-->
            </div><!--//row-->
            <div class="g-4 settings-section col-12 col-md-6">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="app-card-header">
                        <h3 class="section-title">Cảm biến ánh sáng</h3>
                    </div>
                    <div class="app-card-body">
                        <form class="settings-form">
                            <div class="mb-3">
                                <label for="setting-input-1" class="form-label">Ngưỡng trên</label>
                                <input type="text" class="form-control" id="setting-input-1" value="1000">
                            </div>
                            <div class="mb-3">
                                <label for="setting-input-2" class="form-label">Ngưỡng dưới</label>
                                <input type="text" class="form-control" id="setting-input-2" value="400">
                            </div>
                            <button type="submit" class="btn app-btn-primary" >Save Changes</button>
                        </form>
                    </div><!--//app-card-body-->
                </div><!--//app-card-->
            </div><!--//row-->
        </div><!--//container-fluid-->
    </div><!--//app-content-->
</div>


