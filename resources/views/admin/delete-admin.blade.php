@php
    if (is_submit('delete_user'))
{
    // Lấy ID và ép kiểu
    $id = (int)input_post('codeAdmin');
    if ($id)
    {
        // Lấy thông tin người dùng
        $admin = DB::table('admin')
            ->where(['id'=> $id])
            ->get();
        ;

        // Kiểm tra có phải xóa admin hay không
         if ($admin['role'] == '1'){
            ?>
            <script language="javascript">
                alert('Bạn không thể xóa Supper Admin được!');
                window.location = '<?php echo input_post('redirect'); ?>';
            </script>
            <?php
        }
        else
        {
            $sql = db_create_sql('DELETE FROM tb_user {where}', array(
                'id' => $id
            ));

            if (db_execute($sql)){
                ?>
                <script language="javascript">
                    alert('Xóa thành công!');
                    window.location = '<?php echo input_post('redirect'); ?>';
                </script>
                <?php
            }
            else{
                ?>
                <script language="javascript">
                    alert('Xóa thất bại!');
                    window.location = '<?php echo input_post('redirect'); ?>';
                </script>
                <?php
            }
        }
    }
}
else{
    // Nếu không phải submit delete user thì chuyển về trang chủ
    redirect(base_url('admin'));
}
@endphp
