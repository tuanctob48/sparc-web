<?php
/****************************************************************
File Name       : generate.blade.php
Description     : Header of generate page
Creation Date   : 2016/06/10
Author          : FPT/KhanhTH
Change History  :
 ****************************************************************/
?>



<?php $__env->startSection('content'); ?>

<?php

   // $callerName = $getArrayCaller;
   // $calleeName = $getArrayClaee;
    $arrayCaller = null;
    $arrayCallee = null;
    $var = 0;
        $count =0;
    /* Caller */	
    for($var = 0;$var<4;$var++)
    {
        for($cxvar=0;$cxvar<3;$cxvar++){

                $getArrayCaller[$var][$cxvar]='lop goi' .(string)$var .(string)$cxvar;
                $getArrayCallee[$var][$cxvar]='lop di toi' .(string)$var .(string)$cxvar;           
        }
    	
    }

    $var = 0;

        json_encode($getArrayCaller);
        json_encode($getArrayCallee);

        $folder = 'dulieu';
        json_encode($folder);
        $getArrayFunction='lop cha';
        json_encode($getArrayFunction);

?>


    <form class="form-inline"  role="form" style="float: right;padding-right: 10px;padding-top:1%;">
            <button type="button" class="btn btn-success">Export</button>
    </form>
    <div style="padding-left:30px;padding-top:2%;">
        <h4 class="text-danger">Level: </h4>
        <select style="width:10%">
            <option value="16MHonda"></option>
            <option value="android_auto">level 1</option>
            <option value="CarPlay">level 2</option>
            <option value="17M">level 3</option>

        </select>
        <form role="form">
            <label class="radio-inline">
                <input type="radio" name="optradio" id="all_id" checked="checked" onclick="makeGraph(this);">All
            </label>
            <label class="radio-inline">
                <input type="radio" name="optradio" id="caller_id" onclick="makeGraph(this);">Caller
            </label>
            <label class="radio-inline">
                <input type="radio" name="optradio" id="callee_id" onclick="makeGraph(this);">Callee
            </label>
        </form>
    </div>

    <div id="myDiagramDiv"
         style="border:solid 1px blue;width:100%; height:500px;">
         <script src="/js/go.js"></script>

        <script>

           // function goIntro() {
                /* Function Name */
                var funcName =<?php echo json_encode($getArrayFunction);?>;
                /* Caller Name */
                var callerName =<?php echo json_encode($getArrayCaller);?>;
                /* Callee Name */
                 var calleeName =<?php echo json_encode($getArrayCallee);?>;
               /* Folder Name */
               var folderName =<?php echo json_encode($folder);?>;



                var $ = go.GraphObject.make;
                var graygrad = $(go.Brush, "Linear", {0: "#F5F5F5", 1: "#F1F1F1"});
                var bluegrad = $(go.Brush, "Linear", {0: "#CDDAF0", 1: "#91ADDD"});
                var yellowgrad = $(go.Brush, "Linear", {0: "#FEC901", 1: "#FEA200"});
                var lavgrad = $(go.Brush, "Linear", {0: "#EF9EFA", 1: "#A570AD"});
                myDiagram = $(go.Diagram, "myDiagramDiv", {initialContentAlignment: go.Spot.Center,initialAutoScale: go.Diagram.Uniform });

                /*node*/
                myDiagram.nodeTemplate =
                        $(go.Node, "Auto",
                                {
                                    fromSpot: go.Spot.Right,  // coming out from middle-right
                                    toSpot: go.Spot.Left,
                                    isTreeExpanded: true
                                },   // going into at middle-left
                                $(go.Shape, "Rectangle", {width:350,height:70,fill: "lightblue"}),
                                $(go.Panel, "Table",
                                        {defaultAlignment: go.Spot.Top, defaultColumnSeparatorStroke: "black"},
                                        $(go.Panel, "Table",
                                                {column: 0},
                                                $(go.TextBlock,
                                                        {
                                                            column: 0, margin: new go.Margin(3, 3, 0, 3),
                                                            font: " 12pt sans-serif"
                                                        },
                                                        new go.Binding("text", "key")),

                                                $("PanelExpanderButton", "LIST1",
                                                        {column: 1}),
                                                $(go.Panel, "Vertical",
                                                        {name: "LIST1", row: 1, column: 0, columnSpan: 2},
                                                        new go.Binding("itemArray", "list1")
//                                                        {
//                                                            click: function (e, obj) {
//                                                                window.open("https://en.wikipedia.org/w/index.php?search=" + encodeURIComponent(obj.part.data.text));
//                                                            }
//                                                        }
                                                )
                                        )
                                )
                        );


                myDiagram.linkTemplate =
                        $(go.Link,
                                { routing: go.Link.Orthogonal, corner: 5 },
                                $(go.Shape, { strokeWidth: 3, stroke: "#555" }),
                                $(go.Shape, {toArrow: "Standard"})
                        );

                makeGraph(myDiagram);


                function makeGraph(myDiagram) {
                    var $ = go.GraphObject.make;

                    myDiagram.layout =
                            $(go.LayeredDigraphLayout,  // this will be discussed in a later section
                                    {
                                        columnSpacing: 5,
                                        setsPortSpots: false
                                    });
                    var count = 0;
                    var nodeDataArray = new Array();
                    nodeDataArray[0] = {key: funcName, list1: ["Folder: "+folderName, "File: "]};
                    // nodeDataArray[1] = { key: "b" };
                    for ($i = 0; $i < callerName.length; $i++) {
                        var nodechild1a = {key: callerName[$i][0],list1: ["Folder: "+folderName, "File: "]}
                        nodeDataArray.push(nodechild1a);
                        var nodechild2a = {key: callerName[$i][1],list1: ["Folder: "+folderName, "File: "]}
                        nodeDataArray.push(nodechild2a);
                        var nodechild3a = {key: callerName[$i][2],list1: ["Folder: "+folderName, "File: "]}
                        nodeDataArray.push(nodechild3a);
                    }



                    for ($i = 0; $i < calleeName.length; $i++) {
                        var nodechild1b = {key: calleeName[$i][0],list1: ["Folder: "+folderName, "File: "]}
                        nodeDataArray.push(nodechild1b);
                        var nodechild2b = {key: calleeName[$i][1],list1: ["Folder: "+folderName, "File: "]}
                        nodeDataArray.push(nodechild2b);
                        var nodechild3b = {key: calleeName[$i][2],list1: ["Folder: "+folderName, "File: "]}
                        nodeDataArray.push(nodechild3b);
                    }


                    var linkDataArray = new Array();
                    for ($i = 0; $i < callerName.length; $i++) {


                            var child1a = {from: funcName, to:callerName[$i][0]};
                            linkDataArray.push(child1a);

                            var child2a = {from: callerName[$i][0], to:callerName[$i][1]};
                                linkDataArray.push(child2a);

                              var child3a = {from: callerName[$i][1], to:callerName[$i][2]};
                            linkDataArray.push(child3a);

                        count++;
                    }
                    for ($i = 0; $i < calleeName.length; $i++) {

 
                            var child1b = {from:calleeName[$i][0] , to:funcName};
                            linkDataArray.push(child1b);
 
                                var child2b = {from: calleeName[$i][1], to:calleeName[$i][0]};
                                linkDataArray.push(child2b);

                             var child3b = {from: calleeName[$i][2], to:calleeName[$i][1]};
                                linkDataArray.push(child3b);

                        count++;
                    }


                    myDiagram.model = new go.GraphLinksModel(nodeDataArray, linkDataArray);
                    switch (myDiagram.id) {
                        case "all_id":
                            alert("asdasdsa");
                            break;
                        case "caller_id":
                            alert("asdasdsa");
                            break;
                        case "callee_id":
                            alert("asdasdsa");
                            break;
                        default:
                            break;
                    }

                }
           // }

        </script>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>