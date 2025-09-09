Sub EnviarCorreosMasivos()
    Dim OutlookApp As Object
    Dim OutlookMail As Object
    Dim sh As Worksheet
    Dim i As Integer
    Dim LastRow As Long
    Dim RutaPDF As String
    Dim NombreArchivoPDF As String
    Dim NombreArchivoPDF2 As String
    Dim Correo As String
    Dim Nombre As String
    Dim Nombre2 As String
    Dim Puesto As String

    RutaPDF = "C:\Users\SETUR22\Documents\oficios-Inversion-Turistica\"

    Set sh = ThisWorkbook.Sheets("Hoja1")

    LastRow = sh.Cells(sh.Rows.Count, "B").End(xlUp).Row

    Set OutlookApp = CreateObject("Outlook.Application")

    For i = 2 To LastRow
        Correo = sh.Cells(i, 3).Value
        Nombre = sh.Cells(i, 1).Value
        Nombre2 = sh.Cells(i, 2).Value
        Puesto = sh.Cells(i, 4).Value

        NombreArchivoPDF = RutaPDF & Nombre & ".pdf"  ' Crea un nuevo correo electrónico
        NombreArchivoPDF2 = RutaPDF & Nombre2 & ".pdf"  ' Crea un nuevo correo electrónico
        
        Set OutlookMail = OutlookApp.CreateItem(0)

        With OutlookMail
            .To = Correo
            .Subject = "Solicitud de Información sobre la Inversión Turística 2023-2024"
            .Body = "Estimado/a " & Nombre & "," & vbCrLf & vbCrLf & _
                    "Adjunto encontrará el oficio en el que se solicita la información sobre la inversión turística del año 2023 y lo que va del 2024 correspondiente a su municipio." & vbCrLf & vbCrLf & _
                    "Agradecemos de antemano su colaboración y quedamos a su disposición para cualquier duda o aclaración." & vbCrLf & vbCrLf & _
                    "Atentamente," & vbCrLf & _
                    "Ing. Laura Guadalupe Aguirre Macias" & vbCrLf & _
                    "Tel: (614)-429-33-00 Ext. 14558" & vbCrLf


            .Attachments.Add NombreArchivoPDF
            .Attachments.Add NombreArchivoPDF2


            .Send
        End With

        Set OutlookMail = Nothing
    Next i

    Set OutlookApp = Nothing

    MsgBox "Correos enviados exitosamente", vbInformation
End Sub
