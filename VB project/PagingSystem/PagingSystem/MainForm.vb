'Option Strict On
Imports MySql.Data.MySqlClient

Public Class MainForm
    Dim second As Integer
    Dim NextIndex As Integer
    'Dim count As Integer
    Dim DayNumeric As Integer
    Dim Profile As Integer
    Dim DirectorySongs As String = "C:\Program Files (x86)\xampp\htdocs\Paging\songs\"

#Region "1. Get Profile Paging"
    Private Sub CurrentProfile()
        DayNumeric = (DateTime.Now.DayOfWeek + 6) Mod 7 + 1
        ConnectDatabase()

        query1 = "SELECT * from daily_profile d inner join profile p " _
            & "on d.id_profile = p.id_profile where hari=" & DayNumeric & " limit 1"

        cmd = New MySqlCommand(query1, conn)
        rd = cmd.ExecuteReader
        If rd.HasRows Then
            Do While rd.Read
                lblProfile.Text = rd("nm_profile")
                Profile = rd("id_profile")
            Loop
        End If
        conn.Close()
    End Sub
#End Region

#Region "2. Fill Sound to List"
    Private Sub FillListPlaySound()
        Dim ItemTemp As String
        ConnectDatabase()
        ScheduleTable = New DataTable
        query1 = "SELECT TIME, nm_paging, mp3 FROM schedule_paging AS s INNER JOIN master_paging AS m " _
            & " ON s.id_paging = m.id_paging WHERE id_profile='" & Profile & "' ORDER BY TIME ASC"
        ScheduleTable.Clear()
        da = New MySqlDataAdapter(query1, conn)
        da.Fill(ScheduleTable)
        ' fill listbox
        Dim i As Integer
        For i = 0 To ScheduleTable.Rows.Count - 1 Step i + 1
            ItemTemp = String.Format("{0}  {1}", ScheduleTable.Rows(i)(0), ScheduleTable.Rows(i)(1))
            lsbHistory.Items.Add(ItemTemp)
        Next

        'Next Index
        Dim k As Integer
        For k = 0 To ScheduleTable.Rows.Count - 1 Step k + 1
            If ScheduleTable.Rows(k)(0).ToString > TimeOfDay.ToString("HH:mm:ss") Then
                NextIndex = k
                lsbHistory.SelectedIndex = NextIndex
                Exit For
            End If
            ' must give else option
        Next
        conn.Close()
    End Sub
#End Region

    Private Sub PlaySound(ByVal UrlSong As String)
        AxWindowsMediaPlayer1.URL = DirectorySongs & UrlSong
    End Sub

    Private Sub MainForm_FormClosing(ByVal sender As Object, ByVal e As System.Windows.Forms.FormClosingEventArgs) Handles Me.FormClosing
        e.Cancel = True
    End Sub

    'load awal proses
    Private Sub Form1_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        ConnectDatabase()
        CurrentProfile()
        FillListPlaySound()
        Timer1.Start()
    End Sub

    Private Sub Timer1_Tick(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Timer1.Tick
        lblDate.Text = DateTime.Now.ToString("D")
        lblTime.Text = DateTime.Now.ToString("HH:mm:ss")

        If (TimeOfDay.ToString("HH:mm:ss") = "06:40:00") Then
            lsbHistory.Items.Clear()
            CurrentProfile()
            FillListPlaySound()
        Else
            Try
                If TimeOfDay.ToString("HH:mm:ss") >= ScheduleTable.Rows(NextIndex)(0).ToString Then
                    If ScheduleTable.Rows(NextIndex)(0).ToString = "00:00:00" Then
                        If TimeOfDay.ToString("HH:mm:ss") <= "00:00:59" And TimeOfDay.ToString("HH:mm:ss") >= "00:00:00" Then
                            PlaySound(ScheduleTable.Rows(NextIndex)(2))
                            If NextIndex = ScheduleTable.Rows.Count - 1 Then
                                NextIndex = 0
                                lsbHistory.SelectedIndex = NextIndex
                            Else
                                NextIndex = NextIndex + 1
                                lsbHistory.SelectedIndex = NextIndex
                            End If
                        End If
                    Else
                        PlaySound(ScheduleTable.Rows(NextIndex)(2))
                        If NextIndex = ScheduleTable.Rows.Count - 1 Then
                            NextIndex = 0
                            lsbHistory.SelectedIndex = NextIndex
                        Else
                            NextIndex = NextIndex + 1
                            lsbHistory.SelectedIndex = NextIndex
                        End If
                    End If
                End If
            Catch ex As Exception
                Timer1.Stop()
                MessageBox.Show("Data Not Found In Current Profile")
            End Try

        End If
    End Sub

    Private Sub Button1_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button1.Click
        lsbHistory.Items.Clear()
        CurrentProfile()
        FillListPlaySound()
    End Sub
End Class
