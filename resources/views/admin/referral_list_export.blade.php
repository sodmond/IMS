<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    Hello
    <?php
        /*$header = [
            'Fullname',
            'Email',
            'Gender',
            'Date Of Birth',
            'Phone',
            'State',
            'Country',
            'Ref Code',
            'Account Name',
            'Bank Name',
            'Account Number',
            'Referred By',
            'Created At',
        ];*/
        $filename = 'Referral-List-' . $week . '.csv';
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename='.$filename);
        $output = fopen('php://output', 'w');
        fputcsv($output, $header);
        foreach ($refList as $ref) {
            $row = [
                $ref->fullname, $ref->email, $ref->gender, $ref->dob,
                $ref->phone, $ref->state, $ref->country, 
                $ref->ref_code, $ref->acct_name, $ref->bank_name, 
                $payout->acct_num, $ref->ref_by, $ref->created_at
            ];
            fputcsv($output, $row);
        }
        echo "Hello";
?>

</body>
</html>
