<html>

<head>
    <meta charset="UTF-8">
    <meta http-qpuiv="X-UA-Compatible" content="ID=edge">
    <meta name="viewport" content="width=device-width, inticial-scale=1">
    <title>Pure CSS3 Tab</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>
        /*
 * Title: Pure CSS3 Tabs
 * Author: Clear
 * Version: 1.0.1
 * Create: 2015-05-31
 * Update: 2015-06-05
 */
        /* CSS Reset */
        * {
            padding: 0;
            margin: 0;
            list-style: none;
            box-sizing: border-box;
            outline: none;
            font-weight: normal;
        }

        body {
            background: grey;
            font-family: "Segoe UI", "Microsoft YaHei";
        }

        a {
            color: #fff;
            text-decoration: none;
        }

        header {
            color: #fff;
            text-align: center;
            min-height: 100px;
            margin-bottom: 10px;
        }

        header h1 {
            margin-top: 20px;
            font-size: 50px;
            margin-bottom: 20px;
            font-weight: 100;
        }

        header a {
            font-size: 18px;
            margin-left: 20px;
        }

        .copyright {
            font-size: 25px;
            font-weight: 100;
            color: #fff;
            text-align: center;
            margin-top: 100px;
        }

        /* Tabs Start */

        .ease {
            -webkit-transition: all .5s;
            -moz-transition: all .5s;
            -o-transition: all .5s;
            transition: all .5s;
        }

        .container {
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
        }

        .tabs {
            background: #fff;
            position: relative;
            margin-bottom: 50px;
        }

        .tabs>input,
        .tabs>span {
            width: 20%;
            height: 60px;
            line-height: 60px;
            position: absolute;
            top: 0;
        }

        .tabs>input {
            cursor: pointer;
            filter: alpha(opacity=0);
            opacity: 0;
            position: absolute;
            z-index: 99;
        }

        .tabs>span {
            background: #f0f0f0;
            text-align: center;
            overflow: hidden;
        }

        .tabs>span i,
        .tabs>span {
            -webkit-transition: all .5s;
            -moz-transition: all .5s;
            -o-transition: all .5s;
            transition: all .5s;
        }

        .tabs>input:hover+span {
            background: rgba(255, 255, 255, .1);
        }

        .tabs>input:checked+span {
            background: #fff;
        }

        .tabs>input:checked+span,
        .tabs>input:hover+span {
            color: #3498DB;
        }

        #tab-1,
        #tab-1+span {
            left: 0;
        }

        #tab-2,
        #tab-2+span {
            left: 20%;
        }

        #tab-3,
        #tab-3+span {
            left: 40%;
        }

        #tab-4,
        #tab-4+span {
            left: 60%;
        }

        #tab-5,
        #tab-5+span {
            left: 80%;
        }

        .tab-content {
            padding: 80px 20px 20px;
            width: 100%;
            min-height: 600px;
        }

        .tab-content section {
            width: 100%;
            display: none;
        }

        .tab-content section h1 {
            margin-top: 15px;
            font-size: 100px;
            font-weight: 100;
            text-align: center;
        }

        #tab-1:checked~.tab-content #tab-item-1 {
            display: block;
        }

        #tab-2:checked~.tab-content #tab-item-2 {
            display: block;
        }

        #tab-3:checked~.tab-content #tab-item-3 {
            display: block;
        }

        #tab-4:checked~.tab-content #tab-item-4 {
            display: block;
        }

        #tab-5:checked~.tab-content #tab-item-5 {
            display: block;
        }

        /* effect-1 */

        .effect-1>input:checked+span {
            background: #fff;
        }


        /* effect-2 */

        .effect-2 span i {
            padding-right: 15px;
        }

        @media (max-width: 600px) {
            .effect-2 span span {
                display: none;
            }

            .effect-2 span i {
                padding: 0;
            }
        }

        /* effect-3 */

        .effect-3 .line {
            background: #3498DB;
            width: 20%;
            height: 4px;
            position: absolute;
            top: 56px;
        }

        #tab-1:checked~.line {
            left: 0;
        }

        #tab-2:checked~.line {
            left: 20%;
        }

        #tab-3:checked~.line {
            left: 40%;
        }

        #tab-4:checked~.line {
            left: 60%;
        }

        #tab-5:checked~.line {
            left: 80%;
        }


        /* effect-4 */

        .effect-4 span i {
            font-size: 18px;
            display: block;
            position: absolute;
            left: 50%;
            top: 0;
            opacity: 0;
            transform: translateX(-50%);
        }

        .effect-4 span span {
            position: relative;
            top: 10px;
        }

        .effect-4>input:checked+span i,
        .effect-4>input:hover+span i {
            top: 20%;
            opacity: 1;
        }

        /* effect-5 */

        .effect-5>input:checked+span i,
        .effect-5>input:hover+span i {
            font-size: 25px;
        }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <h1>User Dashboard</h1>
        </header>

        <div class="tabs effect-3">
            <!-- tab-title -->
            <input type="radio" id="tab-1" name="tab-effect-3" checked="checked">
            <span>Profile</span>

            <input type="radio" id="tab-2" name="tab-effect-3">
            <span>Active Order</span>

            <input type="radio" id="tab-3" name="tab-effect-3">
            <span>History</span>

            <input type="radio" id="tab-4" name="tab-effect-3">
            <span>Add Card</span>

            <input type="radio" id="tab-5" name="tab-effect-3">
            <span>Logout</span>

            <div class="line ease"></div>

            <!-- tab-content -->
            <div class="tab-content">
                <section id="tab-item-1">
                    <br>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-6">
                                <form>
                                    <div class="form-group">
                                        <label >Name</label>
                                        <input type="text" class="form-control">
                                    </div>
<br>
                                    <div class="form-group">
                                        <label >Email address</label>
                                        <input type="email" class="form-control">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label >Phone</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label >Password</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>
                            <div class="col-md-2"></div>

                        </div>
                    </div>
                </section>
                <section id="tab-item-2">
                    <br>

                    <table class="table table-striped">
                        <thead>
                            <tr style="background-color: grey;">
                                <th scope="col">Order #</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Status</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" style="color:black">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row" style="color:black">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </section>
                <section id="tab-item-3">
                    <br>
                    <h1>Order History</h1>
                </section>
                <section id="tab-item-4">
                    <br>
                    <h1>Four</h1>
                </section>
                <section id="tab-item-5">
                    <br>
                    <h1>Five</h1>
                </section>
            </div>
        </div>

    </div>
    </div>
    <footer class="footer">
        <div class="container">
            <div class="copyright"><b>
                    <a href="http://zelektra.com/" target="_blank"><span style="color:white">Z</span>&nbsp;<span style="color:red">ELEKTRA</span></a></b>
            </div>
        </div>
    </footer>
</body>

</html>