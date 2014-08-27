

    <body id="page-top" class="index">

            <div style="position:relative;top:20px;">
                <form class="form-horizontal" role="form" enctype="multipart/form-data" action="plan_form.php" method="post">
                    <div class="form-group">
                        <div class="col-sm-8">
                            <h4>Share your plan to find mate for you</h4>

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="destination" class="col-sm-2 control-label">Destination</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="destination" name="destination" autofocus required
                                   placeholder="Enter your destination">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Purpose" class="col-sm-2 control-label">Purpose</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="Purpose" name="motive" required
                                   placeholder="Enter your purpose">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date" class="col-sm-2 control-label">Date</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="date" name="start_date" required
                                   placeholder="Enter date you want to visit">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="duration" class="col-sm-2 control-label">Duration</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="duration" name="duration" required
                                   placeholder="Enter duration">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-8">
                            <input type="textarea" class="form-control" id="address"  required name="description"
                                   placeholder="Enter description">
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Share</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>