<html>
<head>
    <title>Cambio de contraseña</title>
    <style type="text/css">
        a {
            color: #ffffff;
        }

        body, #header h1, #header h2, p {
            margin: 0;
            padding: 0;
        }

        #main {
            border: 1px solid #cfcece;
        }

        img {
            display: block;
        }

        #top-message p, #bottom p {
            color: #3f4042;
            font-size: 12px;
            font-family: Arial, Helvetica, sans-serif;
        }

        #header h1 {
            color: #ffffff !important;
            font-family: "Lucida Grande", sans-serif;
            font-size: 24px;
            margin-bottom: 0 !important;
            padding-bottom: 0;
        }

        #header p {
            color: #ffffff !important;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
        }

        h5 {
            margin: 0 0 0.8em 0;
        }

        h5 {
            font-size: 18px;
            color: #444444 !important;
            font-family: Arial, Helvetica, sans-serif;

        }

        p {
            font-size: 12px;
            color: #444444 !important;
            font-family: Arial, Helvetica, sans-serif;
            line-height: 1.5;
        }

        .card {
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
        }

        .card-body {
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            padding: 1.25rem;
        }

        .card-title {
            margin-bottom: .75rem;
        }

        .text-muted {
            color: #6c757d !important;
        }

        .text-info {
            color: #ffffff !important;
            background-color: #808B96 !important;
        }

        .card-footer {
            padding: .75rem 1.25rem;
            background-color: rgba(0, 0, 0, .03);
            border-top: 1px solid rgba(0, 0, 0, .125);
        }
        .tablee {     font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
            font-size: 12px;    margin: auto;     width: 100%; text-align: left;    border-collapse: collapse; }

        .thh {     font-size: 13px;     font-weight: normal;     padding: 8px;     background: #b9c9fe;
            border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039; }

        .tdd {     font-weight: bold;
            padding: 8px;     background: #e8edff;   text-align: justify;    border-bottom: 1px solid #fff;
            color: #669;    border-top: 1px solid transparent; }

    </style>
</head>
<body>

<table width="100%" cellpadding="0" cellspacing="0" bgcolor="e4e4e4">
    <tr>
        <td>
            <table id="top-message" cellpadding="20" cellspacing="0" width="600" align="center">
                <tr>
                    <td align="center">
                    </td>
                </tr>
            </table>

            <table id="main" width="600" align="center" cellpadding="0" cellspacing="15" bgcolor="ffffff">
                <tr>
                    <td>
                        <table id="header" cellpadding="10" cellspacing="0" align="center" bgcolor="8fb3e9">
                            <tr>
                                <td width="570" align="center" bgcolor="#0098FF"><h1>Quantika</h1></td>
                            </tr>
                            <tr>
                                <td width="570" align="center" bgcolor="#666666"><p><a>ASUNTO:
                                 CAMBIO DE CONTRASEÑA
                                </a></p></td>
                            </tr>

                            <tr>
                                <td width="400" align="center" bgcolor="#FFFFFF">
                                    <TABLE BORDER class="tablee"  >
                                        <TR><TH class="thh">Nueva Contraseña es:</TH>
                                            <TD  class="tdd">{{ $data}}</TD></TR>

                                    </TABLE></td>
                            </tr>
                        </table>

                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="card text-center">
                        </div>
                    </td>
                </tr>
                <tr>
                    <table id="bottom" cellpadding="20" cellspacing="0" width="600" align="center">
                        <tr>
                            <td align="center">
                                <p></p>
                                <p></p>
                            </td>
                        </tr>
                    </table><!-- top message -->
                </tr>
            </table><!-- wrapper -->
        </td>
    </tr>
</table>
<script>
</script>
</body>
</html>