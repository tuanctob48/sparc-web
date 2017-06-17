
      // This example creates a 2-pixel-wide red polyline showing the path of William
      // Kingsford Smith's first trans-Pacific flight between Oakland, CA, and
      // Brisbane, Australia.

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
          center: {lat: 21.0051226, lng: 105.8464602},
          mapTypeId: 'terrain'
        });

        var flightPlanCoordinates = [
			{lat:21.0051514, lng:105.8456804},
{lat:21.0016724, lng:105.84513},
{lat:20.9995283333333, lng:105.84563},
{lat:20.9963894, lng:105.8464144},
{lat:20.9960366666666, lng:105.850175},
{lat:20.9982982, lng:105.8682506},
{lat:21.0058866666666, lng:105.877688333333},
{lat:21.0057066666666, lng:105.877831666666},
{lat:21.0108479, lng:105.8776556},
{lat:21.0183153, lng:105.8905023},
{lat:21.0263237, lng:105.8962378},
{lat:21.0252022, lng:105.8951824},
{lat:21.0204816666666, lng:105.89243},
{lat:21.0199433333333, lng:105.892171666666},
{lat:21.0130433333333, lng:105.885181666666},
{lat:21.0132433333333, lng:105.88519},
{lat:21.0089766666666, lng:105.880626666666},
{lat:21.0085516666666, lng:105.880533333333},
{lat:21.0086999999999, lng:105.880338333333},
{lat:21.0086083333333, lng:105.880371666666},
{lat:21.0023679, lng:105.8787837},
{lat:21.0017117, lng:105.8747194},
{lat:21.005405, lng:105.8747194},
{lat:20.9978215, lng:105.866599},
{lat:20.9960116, lng:105.8618279},
{lat:20.9956298, lng:105.8515521},
{lat:20.9958632, lng:105.8510016},
{lat:20.996888, lng:105.8502218},
{lat:21.0005245, lng:105.8505429},
{lat:21.0009266666666, lng:105.850058333333},
{lat:21.0017243, lng:105.8493502},
{lat:21.0051923, lng:105.8457263},
{lat:21.0067342, lng:105.8452217},
{lat:21.00661, lng:105.8452217},
{lat:21.0071361, lng:105.8486162},
{lat:21.008255, lng:105.850791666666},
{lat:21.0071589, lng:105.8474236},
{lat:21.0042789, lng:105.8472401},
{lat:21.003187, lng:105.8482493},
{lat:21.0018883, lng:105.844763},
{lat:21.0051105, lng:105.8456346},
{lat:21.0049112, lng:105.844396},
{lat:21.0046657, lng:105.8441208}
        ];
        var flightPath = new google.maps.Polyline({
          path: flightPlanCoordinates,
          geodesic: true,
          strokeColor: '#FF0000',
          strokeOpacity: 1.0,
          strokeWeight: 2
        });

        flightPath.setMap(map);
      }
  