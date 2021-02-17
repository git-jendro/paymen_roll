<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'The :attribute must be accepted.',
    'active_url' => 'The :attribute is not a valid URL.',
    'after' => 'The :attribute must be a date after :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => 'The :attribute may only contain letters.',
    'alpha_dash' => 'The :attribute may only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'The :attribute may only contain letters and numbers.',
    'array' => 'The :attribute must be an array.',
    'before' => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file' => 'The :attribute must be between :min and :max kilobytes.',
        'string' => 'The :attribute must be between :min and :max characters.',
        'array' => 'The :attribute must have between :min and :max items.',
    ],
    'boolean' => 'The :attribute field must be true or false.',
    'confirmed' => 'The :attribute confirmation does not match.',
    'date' => 'The :attribute is not a valid date.',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => 'The :attribute does not match the format :format.',
    'different' => 'The :attribute and :other must be different.',
    'digits' => 'The :attribute must be :digits digits.',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'email' => 'The :attribute must be a valid email address.',
    'ends_with' => 'The :attribute must end with one of the following: :values.',
    'exists' => 'The selected :attribute is invalid.',
    'file' => 'The :attribute must be a file.',
    'filled' => 'The :attribute field must have a value.',
    'gt' => [
        'numeric' => 'The :attribute must be greater than :value.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'string' => 'The :attribute must be greater than :value characters.',
        'array' => 'The :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'The :attribute must be greater than or equal :value.',
        'file' => 'The :attribute must be greater than or equal :value kilobytes.',
        'string' => 'The :attribute must be greater than or equal :value characters.',
        'array' => 'The :attribute must have :value items or more.',
    ],
    'image' => 'The :attribute must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'The :attribute must be an integer.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'string' => 'The :attribute must be less than :value characters.',
        'array' => 'The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file' => 'The :attribute must be less than or equal :value kilobytes.',
        'string' => 'The :attribute must be less than or equal :value characters.',
        'array' => 'The :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file' => 'The :attribute may not be greater than :max kilobytes.',
        'string' => 'The :attribute may not be greater than :max characters.',
        'array' => 'The :attribute may not have more than :max items.',
    ],
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => 'The :attribute must be at least :min.',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'string' => 'The :attribute must be at least :min characters.',
        'array' => 'The :attribute must have at least :min items.',
    ],
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => 'The :attribute must be a number.',
    'password' => 'The password is incorrect.',
    'present' => 'The :attribute field must be present.',
    'regex' => 'The :attribute format is invalid.',
    'required' => 'The :attribute field is required.',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'numeric' => 'The :attribute must be :size.',
        'file' => 'The :attribute must be :size kilobytes.',
        'string' => 'The :attribute must be :size characters.',
        'array' => 'The :attribute must contain :size items.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values.',
    'string' => 'The :attribute must be a string.',
    'timezone' => 'The :attribute must be a valid zone.',
    'unique' => 'The :attribute has already been taken.',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => 'The :attribute format is invalid.',
    'uuid' => 'The :attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        // 'nip' => [
        //     'required' => 'Haram mengisi kolom NIP !',
        // ],
        'nama' => [
            'required' => 'Harap mengisi kolom  Nama !',
        ],
        'JK' => [
            'required' => 'Harap Pilih Jenis Kelamin !'
        ],
        'tempatlahir' => [
            'required' => 'Harap mengisi kolom Tempat Lahir !'
        ],
        'dob' => [
            'required' => 'Harap mengisi kolom Tanggal Lahir !'
        ],
        'notel' => [
            'required' => 'Harap mengisi kolom Nomor Telpon !',
            'numeric' => 'Kolom Nomor Telpon hanya boleh diisi dengan angka !'
        ],
        'alamatktp' => [
            'required' => 'Harap mengisi kolom Alamat KTP !',
        ],
        'alamatdom' => [
            'required' => 'Harap mengisi kolom Alamat Domisili !'
        ],
        'email' => [
            'required' => 'Harap mengisi kolom Email !',
        ],
        'noktp' => [
            'required' => 'Harap mengisi kolom Nomor KTP !',
            'numeric' => 'Kolom Nomor KTP hanya boleh diisi dengan angka !'
        ],
        'nokk' => [
            'required' => 'Harap mengisi kolom Nomor KK !',
            'numeric' => 'Kolom Nomor KK hanya boleh diisi dengan angka !'
        ],
        'npwp' => [
            'required' => 'Harap mengisi kolom NPWP !',
            'numeric' => 'Kolom NPWP hanya boleh diisi dengan angka !'
        ],
        'statusNikah' => [
            'required' => 'Harap mengisi kolom Status Nikah !'
        ],
        'namaAyah' => [
            'required' => 'Harap mengisi kolom Nama Ayah !'
        ],
        'namaIbu' => [
            'required' => 'Harap mengisi kolom Nama Ibu !'
        ],
        'statusKerja' => [
            'required' => 'Harap mengisi kolom Status Kerja !'
        ],
        'tipeumr' => [
            'required' => 'Harap mengisi kolom Tipe UMR !'
        ],
        'noBpjsKet' => [
            'required' => 'Harap mengisi kolom No. BPJS TK !',
            'numeric' => 'Kolom No. BPJSTK hanya boleh diisi dengan angka !'
        ],
        'noBpjsKes' => [
            'required' => 'Harap mengisi kolom No. BPJS KES !',
            'numeric' => 'Kolom No. BPJS KES hanya boleh diisi dengan angka !'
        ],
        // 'noBpjsKesPas' => [
        //     'required_if' => 'Harap mengisi kolom No. BPJS KES Pasangan ketika memilih status Menikah !!'
        // ],
        // 'namaPas' => [
        //     'required_if' => 'Harap mengisi kolom Nama Pasangan ketika memilih status Menikah !'
        // ],
        // 'jkPas' => [
        //     'required_if' => 'Harap mengisi kolom Jenis Kelamin Pasangan ketika memilih status Menikah !'
        // ],
        // 'noKtpPas' => [
        //     'required_if' => 'Harap mengisi kolom No. KTP Pasangan ketika memilih status Menikah !'
        // ],
        // 'tempatLahirPas' => [
        //     'required_if' => 'Harap mengisi kolom Tempat Lahir Pasangan ketika memilih status Menikah !'
        // ],
        // 'noBpjsKesAn1' => [
        //     'required_with' => 'Harap mengisi mengisikan data diri Anak 1 !'
        // ],
        // 'namaAn1' => [
        //     'required_with' => 'Harap mengisi mengisikan data diri Anak 1 !'
        // ],
        // 'jkAn1' => [
        //     'required_with' => 'Harap mengisi mengisikan data diri Anak 1 !'
        // ],
        // 'tempatLahirAn1' => [
        //     'required_with' => 'Harap mengisi mengisikan data diri Anak 1 !'
        // ],
        // 'dobAn1' => [
        //     'required_with' => 'Harap mengisi mengisikan data diri Anak 1 !'
        // ],
        // 'namaAn2' => [
        //     'required_with' => 'Harap mengisi mengisikan data diri Anak 2 !'
        // ],
        // 'noBpjsKesAn2' => [
        //     'required_with' => 'Harap mengisi mengisikan data diri Anak 2 !'
        // ],
        // 'jkAn2' => [
        //     'required_with' => 'Harap mengisi mengisikan data diri Anak 2 !'
        // ],
        // 'tempatLahirAn2' => [
        //     'required_with' => 'Harap mengisi mengisikan data diri Anak 2 !'
        // ],
        // 'dobAn2' => [
        //     'required_with' => 'Harap mengisi mengisikan data diri Anak 2 !'
        // ],
        // 'namaAn3' => [
        //     'required_with' => 'Harap mengisi mengisikan data diri Anak 3 !'
        // ],
        // 'noBpjsKesAn3' => [
        //     'required_with' => 'Harap mengisi mengisikan data diri Anak 3 !'
        // ],
        // 'jkAn3' => [
        //     'required_with' => 'Harap mengisi mengisikan data diri Anak 3 !'
        // ],
        // 'tempatLahirAn3' => [
        //     'required_with' => 'Harap mengisi mengisikan data diri Anak 3 !'
        // ],
        // 'dobAn3' => [
        //     'required_with' => 'Harap mengisi mengisikan data diri Anak 3 !'
        // ],
        'namaBank' => [
            'required' => 'Harap mengisi kolom Nama Bank !'
        ],
        'atasNama' => [
            'required' => 'Harap mengisi kolom Atas Nama !'
        ],
        'cabang' => [
            'required' => 'Harap mengisi kolom Cabang !'
        ],
        'noRek' => [
            'required' => 'Harap mengisi kolom Nomor Rekening !',
            'numeric' => 'Kolom Nomor Rekening hanya boleh diisi dengan angka !'
        ],
        'PendidikanTerakhir' => [
            'required' => 'Harap mengisi kolom Pendidikan Terakhir !'
        ],
        'ipk' => [
            'required_if' => 'Harap mengisi kolom IPK !'
        ],
        'tahunLulus' => [
            'required' => 'Harap mengisi kolom Tahun Lulus !',
            'numeric' => 'Kolom Tahun Lulus hanya boleh diisi dengan angka untuk format Tahun !'
        ],
        'statusPendidikan' => [
            'required' => 'Harap mengisi kolom Status Pendidikan !'
        ],
        'jabatan' => [
            'required' => 'Harap mengisi kolom Jabatan !'
        ],
        'divisi' => [
            'required' => 'Harap mengisi kolom Divisi !'
        ],
        'penempatan' => [
            'required' => 'Harap mengisi kolom Penempatan !'
        ],
        'tanggalMasuk' => [
            'required' => 'Harap mengisi kolom Tanggal Masuk !'
        ],
        'noPkwt' => [
            'required' => 'Harap mengisi kolom No. PKWT !',
            'numeric' => 'Kolom No. PKWT hanya boleh diisi dengan angka !'
        ],
        'berakhir' => [
            'required' => 'Harap mengisi kolom Tanggal Berakhir !'
        ],
        'mulai' => [
            'required' => 'Harap mengisi kolom Tanggal Mulai !'
        ],
        'lembur' => [
            'required' => 'Harap mengisi kolom Ketentuan Lembur !'
        ],
        'insentif' => [
            'required' => 'Harap mengisi kolom Tarif Insentif !'
        ],
        'bpjsTK' => [
            'required' => 'Harap mengisi kolom Ketentuan BPJS TK !'
        ],
        'bpjsKes' => [
            'required' => 'Harap mengisi kolom Ketentuan BPJS KES !'
        ],
        'bpjsJp' => [
            'required' => 'Harap mengisi kolom Ketentuan BPJS JP !'
        ],
        'TotalHari' => [
            'required' => 'Harap mengisi kolom Jumlah Hari Kerja !'
        ],
        'namapotongan1' => [
            'required' => 'Harap mengisi kolom Nama Potongan 1 !'
        ],
        'potongan1' => [
            'required' => 'Harap mengisi kolom Jumlah Potongan 1 !'
        ],
        'namapotongan2' => [
            'required' => 'Harap mengisi kolom Nama Potongan 2 !'
        ],
        'potongan2' => [
            'required' => 'Harap mengisi kolom Jumlah Potongan 2 !'
        ],
        'area1' => [
            'required' => 'Harap Pilih Area UMR 1 !'
        ],
        'umr1' => [
            'required' => 'Harap mengisi kolom Jumlah UMR 1 !'
        ],
        'area2' => [
            'required' => 'Harap Pilih Area UMR 2 !'
        ],
        'umr2' => [
            'required' => 'Harap mengisi kolom Jumlah UMR 2 !'
        ],
        'area3' => [
            'required' => 'Harap Pilih Area UMR 3 !'
        ],
        'umr3' => [
            'required' => 'Harap mengisi kolom Jumlah UMR 3 !'
        ],
        'area4' => [
            'required' => 'Harap Pilih Area UMR 4 !'
        ],
        'umr4' => [
            'required' => 'Harap mengisi kolom Jumlah UMR 4 !'
        ],
        'area5' => [
            'required' => 'Harap Pilih Area UMR 5 !'
        ],
        'umr5' => [
            'required' => 'Harap mengisi kolom Jumlah UMR 5 !'
        ],
        'area6' => [
            'required' => 'Harap Pilih Area UMR 6 !'
        ],
        'umr6' => [
            'required' => 'Harap mengisi kolom Jumlah UMR 6 !'
        ],
        'area7' => [
            'required' => 'Harap Pilih Area UMR 7 !'
        ],
        'umr7' => [
            'required' => 'Harap mengisi kolom Jumlah UMR 7 !'
        ],
        'area8' => [
            'required' => 'Harap Pilih Area UMR 8 !'
        ],
        'umr8' => [
            'required' => 'Harap mengisi kolom Jumlah UMR 8 !'
        ],
        'area9' => [
            'required' => 'Harap Pilih Area UMR 9 !'
        ],
        'umr9' => [
            'required' => 'Harap mengisi kolom Jumlah UMR 9 !'
        ],
        'area10' => [
            'required' => 'Harap Pilih Area UMR 10 !'
        ],
        'umr10' => [
            'required' => 'Harap mengisi kolom Jumlah UMR 10 !'
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
