//document.querySelector()
window.setInterval(updatePosition,300000);
var ol=require('openlayers');
function init() {
    var multip=[];
    var carPoints=[];
    var carIDs=[];
    var index=0;
    var map,lon,lat;
    var zoomMap;
    
    carPoints=carElements();
    carIDs=carIds();
    index=PositionAvailables(carPoints,carIDs);
    if(index===-1) 
        {lon= -68;
     lat= 12;
    }    
    else
    {
    lon=Number(carPoints[index].longitude);
    lat=Number(carPoints[index].latitude);
    }
   
//    checkBoxesPosition(carPoints,carIDs);
    var centerLonLat=[lon, lat];
    var center= new ol.proj.transform(centerLonLat,'EPSG:4326','EPSG:3857');
    multip=multiPoints(carPoints,carIDs);
    map = new ol.Map(
            {
            layers: [new ol.layer.Tile({source: new ol.source.OSM()})],
            view: new ol.View(
            {center:center,
            zoom:15}),
            target:'basicMap'
            });
    map.addControl(new ol.control.FullScreen());
    map.addControl(new ol.control.ScaleLine());
    
    map.addLayer(carMarkersMap(multip));
 // carNamesOverlay(map,multip);
    //map.on('click',)  
 }
    function updatePosition()
 {
    document.location.reload();
 }
 
function carMarkersMap(multip)
{
    var attr=[];
    var featuresCar=[];
    var multi,carName;
    //multipLonLat=multipLonLatGeo(multip);
    
   // multipLonLat=[[-69.198,9.564],[-69.2018,9.57123]];
    for(var i=0, final=multip.length;i<final;i++)
    {
    multi=new ol.geom.Point([Number(multip[i].longitude),Number(multip[i].latitude)]);
    multi.transform('EPSG:4326','EPSG:3857');
   // attr=allCarFeatures(multip); 
    carName=multip[i].carType+" /"+multip[i].carMfr+" /"+multip[i].carMdl+" /"
                    +multip[i].carColor+" /"+multip[i].carPlate;
    var val=String(i+1);        
    var featureCar=new ol.Feature({
                    geometry: multi,    
                    name: val, 
                    carName: carName,
                    speed:multip[i].speed,
                    direction: multip[i].direction,
                    date:multip[i].date,
                    time:multip[i].time
                });
     
    featureCar.setStyle(stylingVector(featureCar));
    featuresCar.push(featureCar);
    }
    
    var source = new ol.source.Vector({
            features: featuresCar,    
            projection: 'EPSG:4326' 
            });
    
    var layer = new ol.layer.Vector({
    source: source,
    });
    
    carFeaturesUpdate(featuresCar);
    
    return layer;

} 

function tHeadCarFeatures(table)
{
    var tableHead = document.createElement('THEAD');
    var tr, th;
    
    table.appendChild(tableHead);
    tr = document.createElement('TR');
    tableHead.appendChild(tr);
    
    th = document.createElement('TH');
    th.innerHTML="Ítem";
    tr.appendChild(th);
    
    
    th = document.createElement('TH');
    th.innerHTML="Datos del Carro";
    tr.appendChild(th);
    
    th = document.createElement('TH');
    th.innerHTML="Posición";
    tr.appendChild(th);
    
    th = document.createElement('TH');
    th.innerHTML="Velocidad";
    tr.appendChild(th);
    
    th = document.createElement('TH');
    th.innerHTML="Dirección";
    tr.appendChild(th);
    
    th = document.createElement('TH');
    th.innerHTML="Fecha";
    tr.appendChild(th);
    
    th = document.createElement('TH');
    th.innerHTML="Hora";
    tr.appendChild(th);
}

function tBodyCarFeatures(table,featuresCar)
{
    var tr,td,tableBody,item;
    var name, speed, direction, date, time, position, lon, lat;
    var pos=[];
    
    
    var tableBody = document.createElement('TBODY');
    table.appendChild(tableBody);

    for (var i = 0, final=featuresCar.length; i <final ; i++) 
            {
            item=featuresCar[i].get('name');
            name=featuresCar[i].get('carName');
            speed=featuresCar[i].get('speed');
            direction=featuresCar[i].get('direction');
            date=featuresCar[i].get('date');
            time=featuresCar[i].get('time');
            position=featuresCar[i].getGeometry();
    
            tr = document.createElement('TR');
            tableBody.appendChild(tr);
            tr.id="carId"+String(i+1);
            
            td = document.createElement('TD');
            td.appendChild(document.createTextNode(item));
            tr.appendChild(td);
            
            
            td = document.createElement('TD');
            td.appendChild(document.createTextNode(name));
            tr.appendChild(td);
            
            td = document.createElement('TD');
            lon=Number(position.B[0]);
            lat=Number(position.B[1]);
            pos=new ol.proj.transform([lon,lat],'EPSG:3857','EPSG:4326');    
            td.appendChild(document.createTextNode("Lon: "+pos[0].toFixed(4)+" / Lat: "+pos[1].toFixed(4)));
            tr.appendChild(td);
            
            td = document.createElement('TD');
            td.appendChild(document.createTextNode(speed +" Km/hr"));
            tr.appendChild(td);
            
            td = document.createElement('TD');
            td.appendChild(document.createTextNode(direction+ " grados"));
            tr.appendChild(td);
            
            td = document.createElement('TD');
            td.appendChild(document.createTextNode(date));
            tr.appendChild(td);
            
            td = document.createElement('TD');
            td.appendChild(document.createTextNode(time));
            tr.appendChild(td);
            }
      
}

function carFeaturesUpdate(featuresCar)
{
    var tr, td;
// Code from http://stackoverflow.com/questions/14643617/create-table-using-javascript

    var myTableDiv = document.getElementById("carFeatures"); 

    var table = document.createElement('TABLE');
    table.className="table table table-striped table-bordered info table-hover";
    
    tHeadCarFeatures(table);
        
    tBodyCarFeatures(table,featuresCar);
            
    myTableDiv.appendChild(table);
}

function stylingVector(featureCar)
{
    var col, speed,index;
    speed=Number(featureCar.get('speed'));
    if(speed===0){
    col=[255,0,0,0.4];
    index=0;
    }
    else
    {
    col=[0,255,0,0.4];
    index=1;
    }    
    
    var fill = new ol.style.Fill({
        color: col
        });
        var stroke = new ol.style.Stroke({
        color: col
        });
        
        var form=[];
        
        var square= new ol.style.RegularShape({
        fill: fill,
        stroke: stroke,
        points: 4,
        radius: 10,
        angle: Math.PI / 4
        });
        form.push(square);
    
    
        var circle = new ol.style.Circle({
        radius: 6,
        fill: fill,
        stroke: stroke 
        });
        form.push(circle);

        var vectorStyle = new ol.style.Style({
        fill: fill,
        stroke: stroke,
        image: form[index],
        text: new ol.style.Text({
            font:'12px Arial',
            stroke: new ol.style.Stroke({color: [0, 0, 0, 1]}),
            text: featureCar.get('name')
        })
        });
return vectorStyle;  
}

function multiPoints(carPosition,carIds)
 {
    var index; 
    var lon, lat, i;
    var lisPos=[];
    var final;
    for(i=0,final=carIds.length;i<final;i++)
    {    
        index=lastPoint(carIds[i].carId,carPosition);
        if(index!=-1)    
        {
            
            //lon=Number(carPosition[index].longitude);
            //lat=Number(carPosition[index].latitude);
            lisPos.push({carId:carPosition[index].carId,
                        carType:carPosition[index].carType,
                        carMfr:carPosition[index].carMfr,
                        carMdl:carPosition[index].carMdl,
                        carColor:carPosition[index].carColor,
                        carPlate:carPosition[index].carPlate, 
                        latitude:carPosition[index].latitude,
                        longitude:carPosition[index].longitude,
                        date:carPosition[index].date,
                        time:carPosition[index].time,
                        speed:carPosition[index].speed,
                        direction:carPosition[index].direction}
                        );
        }
          
            
    }
   return lisPos;        
 }

 function lastPoint(carId,cars)
    {  
    var datemax, timemax,timeall,timesplit,timecalc;
    var index,i,dateCars,id;
    
    index=-1;
    datemax='1900-01-01';
    timemax=0;
    
    
        for(i=0;i<cars.length;i++)
        {   
            dateCars=cars[i].date;
            timeall=cars[i].time;
            timesplit=timeall.split(":");
            timecalc=timesplit[0]*3600+timesplit[1]*60+timesplit[2];
            id=cars[i].carId;
            if(id-carId==0) 
            {
                 if(dateBigger(datemax,dateCars)<0) 
                {
                datemax=dateCars;
                timemax=timecalc;
                index=i;
                }
                else if (dateBigger(datemax,dateCars)==0 && timecalc > timemax)
                {
                datemax=dateCars;
                timemax=timecalc;
                index=i;               
                }
            } 
        }    
    return index; 
        }
 
 function dateBigger(max,cur)
 {
     var maxYear, maxMonth, maxDay;
     var curYear, curMonth, curDay;
     
     var maxArray = max.split("-");
     maxYear=maxArray[0];
     maxMonth=maxArray[1];
     maxDay=maxArray[2];
     var curArray = cur.split("-");
     curYear=curArray[0];
     curMonth=curArray[1]; 
     curDay=curArray[2];
     
     return (maxYear-curYear)*10000+(maxMonth-curMonth)*100+(maxDay-curDay);
 }
 
 