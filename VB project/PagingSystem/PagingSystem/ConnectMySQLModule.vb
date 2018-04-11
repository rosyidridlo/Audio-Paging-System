Imports MySql.Data.MySqlClient

Module ConnectMySQLModule
    Public conn As MySqlConnection
    Public da As MySqlDataAdapter
    Public rd As MySqlDataReader
    Public cmd As MySqlCommand
    Public ScheduleTable As DataTable

    Public query1 As String
    Public query2 As String
    Public query3 As String

    Public Sub ConnectDatabase()
        Try
            conn = New MySqlConnection
            If conn.State = ConnectionState.Closed Then

                conn.ConnectionString = "server=localhost;database=paging_db;User=root;Password=;"
                conn.Open()
                MainForm.ToolStripStatusLabel3.Text = " CONNECTED "
                MainForm.ToolStripStatusLabel3.BackColor = Color.Lime
            End If
        Catch myerror As Exception
            MessageBox.Show("Error Connecting to the database", "Error Database Server", _
                           MessageBoxButtons.OK, MessageBoxIcon.Exclamation)
            MainForm.ToolStripStatusLabel3.Text = " NOT CONNECTED "
            MainForm.ToolStripStatusLabel3.BackColor = Color.Red
        End Try
    End Sub

    Public Sub DisconnectDatabase()
        Try
            If conn.State = ConnectionState.Open Then
                conn.Close()
                MainForm.ToolStripStatusLabel3.Text = " NOT CONNECTED "
                MainForm.ToolStripStatusLabel3.BackColor = Color.Red
            End If
        Catch myerror As MySql.Data.MySqlClient.MySqlException

        End Try
    End Sub
End Module