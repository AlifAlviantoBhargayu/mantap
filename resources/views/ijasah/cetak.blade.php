
<html>
<head>
    <title>Ijazah</title>
    <link rel="icon" href="http://127.0.0.1:8000/admin/assets/img/ahee.png">
    <style type="text/css">
        body{
            font-family: Arial;
        }

        @media print{
            .no-print{
                display: none;
            }
        }

        table{
            border-collapse: collapse;
        }
    </style>
</head>
<body>
<table border="15" cellpadding="100" cellspacing="0" width="100%">
<tr>
    <td>
        <table width="100%">

            <tr>
                <td colspan="3">
                    <center>
                        <img src="http://127.0.0.1:8000/admin/assets/img/ahee.png" width="200px">
                        <b><p>LEMBAGA BIMBINGAN BELAJAR LES BACA AHE UNIT 1133 </p></b>
                        <p>Jl. Pulau Morotai Gg. M.Saleh No.48 Jagabaya III Wayahalim Bandar Lampung</p>

                        <h1><p style="color:red">PIAGAM KELULUSAN</p></h1>
                        <h4>No: ....../....../....../...... Diberikan Kepada</h4>
                        <h1>{{$murid->nama_lengkap}}</h1>
                        <hr>
                        <p>Yang telah menyelesaikan Program Belajar Baca di Unit 1133</p>
                        <?php
                        echo "Wayhalim   " . date("d / M / Y") . "<br>";

                        ?>
                        <br/>
                    </center>
                </td>
            </tr>
            <tr>
                <td></td>
                <td width="300px">
                    <p>Bandar Lampung, <br/>
                        Pengesah Ijazah,</p>
                    <br/>

                    <br/>
                    <p><b><b>AHE</b></b></p>
                </td>
            </tr>
        </table>
    </td>
</tr>
</table>
<br>
<center><a href="#" class="no-print" onclick="window.print();">Cetak/Print</a></center>
</body>
</html>


