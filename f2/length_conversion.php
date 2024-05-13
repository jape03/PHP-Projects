<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>No1-Length Conversion</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
</head>
<style>
    .chart {
        border: solid #333;
        font-size: 50px;
    }

    .metric,
    .imperial,
    .metric-imperial,
    .imperial-metric {
        border: solid #ccc;
        font-size: 50px;
    }

    tr,
    td {
        border: 1px solid red;
    }
</style>

<body>
    <div class="chart" name="chart">
        <div class="header" name="header">Measure Conversion Chart</div>
        <div class="main_content" name="main_content">
            <section class="metric">Metric Conversions
                <table>
                    <tr>
                        <td>1 cm</td>
                        <td> = </td>
                        <td>10 mm</td>
                    </tr>
                    <tr>
                        <td>1 dm</td>
                        <td> = </td>
                        <td>10 cm</td>
                    </tr>
                    <tr>
                        <td>1 m</td>
                        <td> = </td>
                        <td>100 cm</td>
                    </tr>
                    <tr>
                        <td>1 km</td>
                        <td>= </td>
                        <td>1000 m</td>
                    </tr>
                </table>
            </section>
            <section class="imperial">Imperial Conversions
                <table>
                    <tr>
                        <td>1 ft</td>
                        <td> = </td>
                        <td>12 in</td>
                    </tr>
                    <tr>
                        <td>1 yd</td>
                        <td> = </td>
                        <td>3 ft</td>
                    </tr>
                    <tr>
                        <td>1 ch</td>
                        <td> = </td>
                        <td>22 yd</td>
                    </tr>
                    <tr>
                        <td>1 fur</td>
                        <td>= </td>
                        <td>220 yd</td>
                    </tr>
                    <tr>
                        <td>1 mi</td>
                        <td>= </td>
                        <td>1760 yd</td>
                    </tr>
                </table>
            </section>
            <section class="metric-imperial">Metric -> Imperial Conversions
                <table>
                    <tr>
                        <td>1 mm</td>
                        <td> = </td>
                        <td>0.03937 in</td>
                    </tr>
                    <tr>
                        <td>1 cm</td>
                        <td> = </td>
                        <td>0.39370 in</td>
                    </tr>
                    <tr>
                        <td>1 m</td>
                        <td> = </td>
                        <td>39.37008 in</td>
                    </tr>
                    <tr>
                        <td>1 m</td>
                        <td>= </td>
                        <td>3.28084 ft</td>
                    </tr>
                    <tr>
                        <td>1 m</td>
                        <td>= </td>
                        <td>1.09361 yd</td>
                    </tr>
                    <tr>
                        <td>1 km</td>
                        <td>= </td>
                        <td>1093.6133 yd</td>
                    </tr>
                    <tr>
                        <td>1 km</td>
                        <td>= </td>
                        <td>0.62137 mi</td>
                    </tr>
                </table>
            </section>
            <section class="imperial-metric">Imperial -> Metric Conversions
                <table>
                    <tr>
                        <td>1 in</td>
                        <td> = </td>
                        <td>2.54 cm</td>
                    </tr>
                    <tr>
                        <td>1 ft</td>
                        <td> = </td>
                        <td>30.48 cm</td>
                    </tr>
                    <tr>
                        <td>1 yd</td>
                        <td> = </td>
                        <td>91.44 cm</td>
                    </tr>
                    <tr>
                        <td>1 yd</td>
                        <td>= </td>
                        <td>0.9144 m</td>
                    </tr>
                    <tr>
                        <td>1 mi</td>
                        <td>= </td>
                        <td>1609.344 m</td>
                    </tr>
                    <tr>
                        <td>1 mi</td>
                        <td>= </td>
                        <td>1.609344 km</td>
                    </tr>
                </table>
            </section>

        </div>
    </div>
</body>

</html>