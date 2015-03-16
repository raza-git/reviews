<!DOCTYPE html>
<html><head>


        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <link rel="shortcut icon" type="image/ico" href="http://www.sprymedia.co.uk/media/images/favicon.ico">

        <title>Using DataTable with column filter plugin - Basic Example</title>
        <style type="text/css" title="currentStyle">
            @import "includes/jquery-datatables-column-filter/media/css/demo_page.css";
            @import "includes/jquery-datatables-column-filter/media/css/demo_table.css";
            @import "includes/jquery-datatables-column-filter/media/css/themes/base/jquery-ui.css";

        </style>

        <script src="includes/jquery-datatables-column-filter/media/js/jquery-1.4.4.min.js" type="text/javascript"></script>
        <script src="includes/jquery-datatables-column-filter/media/js/jquery.dataTables.js" type="text/javascript"></script>

        <script src="includes/jquery-datatables-column-filter/media/js/jquery-ui.js" type="text/javascript"></script>

        <script src="includes/jquery-datatables-column-filter/media/js/jquery.dataTables.columnFilter.js" type="text/javascript"></script>
        <script src="includes/js/jquery.jtruncate.pack.js" type="text/javascript"></script>

        <script type="text/javascript" charset="utf-8">
            $(document).ready(function() {
                $('#example').dataTable().columnFilter();
                //test();
                
//                $("#example_next").click(function() {
//                    test();
//                });

            });


//            $(document).ready(function() {
//                test();
//                $("#example_next").click(function() {
//                    test();
//                });
//                
//                $("#example_previous").click(function() {
//                    test();
//                });
//
//
//            });




        </script>


    </head>
    <body id="dt_example">

        <div id="container">
            <div id="demo">

                <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
                    <thead>
                        <tr>
                            <th><div align="left">Category</div></th>
                    <th><div align="left">User</div></th>
                    <th><div align="left">Description</div></th>
                    <th><div align="left">Title</div></th>
                    <th><div align="left">Location</div></th>
                    <th><div align="left">View on Map </div></th>
                    <th><div align="left">Tags</div></th>
                    </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Category</th>
                            <th>User</th>
                            <th>Description</th>
                            <th>Title</th>
                            <th>Location</th>
                            <th>Lat Long</th>
                            <th>Tags</th>
                        </tr>
                    </tfoot>               
                    <tbody>
                        <?php
                        //include all DAO files
                        //include all DAO files
                        require_once('include_dao.php');

                        //print all rows order by title
                        $arr = DAOFactory::getReviewsDAO()->queryByCategoryId($_REQUEST['id']);
                        $counter = 1;
                        for ($i = 0; $i < count($arr); $i++) {
                            $row = $arr[$i];

//		echo $row->id.' '.$row->name.'<br/>';
                            ?>




                            <tr class="<?= ($i % 2 == 0) ? "even_gradeA" : "odd_gradeA" ?>">
                                <td><?= $row->categoryId ?></td>
                                <td><?= $row->userId ?></td>
                                <td>
                                    <div id="descr<?= $i ?>"><?= $row->description ?></div>                                </td>
                                <td><?= $row->name ?></td>
                                <td><?= $row->location ?></td>
                                <td><a href="#">show</a></td>
                                <td><?= rand(0, 1000) ?></td>   
                            </tr>

                            <?php
                            if ($counter == 3) {

                                $counter = 0;
                            }
                            $counter++;
                        }
                        ?>              

                    <script type="text/javascript" charset="utf-8">
                        function test() {
                        <?php
                        for ($i = 0; $i < count($arr); $i++) {
                            ?>

                                                        $('#descr<?= $i ?>').jTruncate({
                                                            length: 50,
                                                            minTrail: 0,
                                                            moreText: "[see all]",
                                                            lessText: "[hide extra]",
                                                            ellipsisText: "....",
                                                            moreAni: "fast",
                                                            lessAni: "fast"
                                                        });



                            <?php
                        }
                        ?>
                        }
                    </script>
                    </tbody>
                </table>

            </div>        
        </div>
        
        <script>
        
        test();
            
        </script>
    </body>





</html>