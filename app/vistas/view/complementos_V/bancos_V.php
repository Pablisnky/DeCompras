<select class="select_2 select_3 borde_1 BancoJS" name="bancoPagoMovil[]" id="BancoPagoMovil"></select>
    <script>
        Opciones = "";
        obj = {
            "" : "Banco",
            // "0003 - BANCO INDUSTRIAL DE VENEZUELA" : "0003 - BANCO INDUSTRIAL DE VENEZUELA",
            "0007&nbsp-&nbspBANC0&nbspBICENTENARIO" : "0007 - BANC0 BICENTENARIO",
            "0102&nbsp-&nbspBANCO&nbspDE&nbspVENEZUELA" : "0102 - BANCO DE VENEZUELA",
            "0104&nbsp-&nbspBANCO&nbspVENEZOLANO&nbspDE&nbspCREDITO" : "0104 - BANCO VENEZOLANO DE CREDITO",
            "0105&nbsp-&nbspBANCO&nbspMERCANTIL" : "0105 - BANCO MERCANTIL",
            "0108&nbsp-&nbspBANCO&nbspPROVINCIAL&nbspBBVA" : "0108 - BANCO PROVINCIAL BBVA",
            "0114&nbsp-&nbspBANCO&nbspDEL&nbspCARIBE" : "0114 - BANCO DEL CARIBE",
            "0115&nbsp-&nbspBANCO&nbspEXTERIOR" : "0115 - BANCO EXTERIOR",
            "0116&nbsp-&nbspBANCO&nbspOCCIDENTAL&nbspDE&nbspDESCUENTO" : "0116 - BANCO OCCIDENTAL DE DESCUENTO",
            // "0121 - CORP BANCA" : "0121 - CORP BANCA",
            "0128&nbsp-&nbspBANCO&nbspCARONÍ" : "0128 - BANCO CARONÍ",
            "0134&nbsp-&nbspBANESCO" : "0134 - BANESCO",
            "0137&nbsp-&nbspSOFITASA" : "0137 - SOFITASA",
            "0138&nbsp-&nbspBANCO&nbspPLAZA" : "0138 - BANCO PLAZA",
            "0145&nbsp-&nbspBANCO&nbspDE&nbspCOMERCIO&nbspEXTERIOR" : "0145 - BANCO DE COMERCIO EXTERIOR",
            "0146&nbsp-&nbspBANGENTE" : "0146 - BANGENTE",
            "0149&nbsp-&nbspBANCO&nbspDEL&nbspPUEBLO&nbspSOBERANO" : "0149 - BANCO DEL PUEBLO SOBERANO",
            "0151&nbsp-&nbspBANCO&nbspFONDO&nbspCOMUN" : "0151 - BANCO FONDO COMUN",
            "0156&nbsp-&nbsp100%&nbspBANCO" : "0156 - 100% BANCO",
            "0157&nbsp-&nbspDEL&nbspSUR" : "0157 - DEL SUR",
            "0163&nbsp-&nbspBANCO&nbspDEL&nbspTESORO" : "0163 - BANCO DEL TESORO",
            "0164&nbsp-&nbspBANCO&nbspDE&nbspDESARROLLO&nbspDEL&nbspMICROEMPRESARIO" : "0164 - BANCO DE DESARROLLO DEL MICROEMPRESARIO",
            "0166&nbsp-&nbspBANCO&nbspAGRICOLA&nbspDE&nbspVENEZUELA" : "0166 - BANCO AGRICOLA DE VENEZUELA",
            "0168&nbsp-&nbspBANCRECER" : "0168 - BANCRECER",
            "0169&nbsp-&nbspMI&nbspBANCO" : "0169 - MI BANCO",
            "0171&nbsp-&nbspBANCO&nbspACTIVO" : "0171 - BANCO ACTIVO",
            "0172&nbsp-&nbspBANCAMIGA" : "0172 - BANCAMIGA",
            "0173&nbsp-&nbspBANCO&nbspINTERNACIONAL&nbspDE&nbspDESARROLLO" : "0173 - BANCO INTERNACIONAL DE DESARROLLO",
            "0174&nbsp-&nbspBANPLUS" : "0174 - BANPLUS",
            "0175&nbsp-&nbspBANCO&nbspAGRICOLA&nbspDE&nbspVENEZUELA" : "0175 - BANCO AGRICOLA DE VENEZUELA",
            "0176&nbsp-&nbspBANCO&nbspESPIRITO&nbspSANTO" : "0176 - BANCO ESPIRITO SANTO",
            "0177&nbsp-&nbspBANFANB" : "0177 - BANFANB",
            "0196&nbsp-&nbspABN&nbspAMRO&nbspBANK" : "0196 - ABN AMRO BANK",
            // "0190 - CITIBANK" : "0190 - CITIBANK",
            "0191&nbsp-&nbspBANCO&nbspNACIONAL&nbspDE&nbspCREDITO" : "0191 - BANCO NACIONAL DE CREDITO",
            "0601&nbsp-&nbspINSTITUTO&nbspMUNICIPAL&nbspDE&nbspCREDITO&nbspPOPULAR" : "0601 - INSTITUTO MUNICIPAL DE CREDITO POPULAR",
        }
        for(var key in obj) {
            Opciones += "<option value=" + key  + ">" +obj[key] + "</option>"
        }
        document.getElementById("BancoPagoMovil").innerHTML = Opciones;
    </script>