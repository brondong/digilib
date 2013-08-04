<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| such as the size rules. Feel free to tweak each of these messages.
	|
	*/

	"accepted"         => "Inputan :attribute harus disetujui.",
	"active_url"       => "Inputan :attribute harus berupa URL yang aktif.",
	"after"            => "Inputan :attribute harus tanggal setelah :date.",
	"alpha"            => "Inputan :attribute harus berupa alfabet.",
	"alpha_dash"       => "Inputan :attribute harus berupa alfabet, nomor, atau strip.",
	"alpha_num"        => "Inputan :attribute harus berupa karakter atau nomor.",
	"before"           => "Inputan :attribute harus tanggal sebelum :date.",
	"between"          => array(
		"numeric" => "Inputan :attribute harus antara :min - :max.",
		"file"    => "Inputan :attribute harus antara :min - :max kilobytes.",
		"string"  => "Inputan :attribute harus antara :min - :max karakter.",
	),
	"confirmed"        => "Konfirmasi :attribute tidak cocok.",
	"date"             => "Inputan :attribute harus berupa tanggal.",
	"date_format"      => "Inputan :attribute harus berformat :format.",
	"different"        => "Inputan :attribute dan :other harus berbeda.",
	"digits"           => "Inputan :attribute harus :digits digit.",
	"digits_between"   => "Inputan :attribute harus antara :min dan :max digit.",
	"email"            => "Inputan :attribute harus berupa alamat email.",
	"exists"           => "Inputan :attribute tidak ditemukan.",
	"image"            => "Inputan :attribute harus berupa gambar.",
	"in"               => "Inputan :attribute tidak cocok.",
	"integer"          => "Inputan :attribute harus berupa integer.",
	"ip"               => "Inputan :attribute alamat IP.",
	"max"              => array(
		"numeric" => "Inputan :attribute tidak boleh lebih dari :max.",
		"file"    => "Inputan :attribute tidak boleh lebih dari :max kilobytes.",
		"string"  => "Inputan :attribute tidak boleh lebih dari :max karakter.",
	),
	"mimes"            => "Inputan :attribute harus berupa file bertipe : :values.",
	"min"              => array(
		"numeric" => "Inputan :attribute harus lebih dari :min.",
		"file"    => "Inputan :attribute harus lebih dari :min kilobytes.",
		"string"  => "Inputan :attribute harus lebih dari :min karakter.",
	),
	"not_in"           => "Inputan :attribute tidak cocok.",
	"numeric"          => "Inputan :attribute harus berupa nomor.",
	"regex"            => "Format inputan :attribute tidak valid.",
	"required"         => "Inputan :attribute harus diisi.",
	"required_if"      => "Inputan :attribute harus diisi ketika :other berisi :value.",
	"required_with"    => "Inputan :attribute harus diisi ketika :values diisi.",
	"required_without" => "Inputan :attribute harus diisi ketika :values tidak diisi.",
	"same"             => "Inputan :attribute dan :other harus sama.",
	"size"             => array(
		"numeric" => "Inputan :attribute harus sebanyak :size.",
		"file"    => "Inputan :attribute harus sebesar :size kilobytes.",
		"string"  => "Inputan :attribute harus sebanyak :size karakter.",
	),
	"unique"           => "Inputan :attribute sudah ada sebelumnya.",
	"url"              => "Inputan :attribute harus berupa URL.",
	"nama_baru" => "Inputan :attribute tidak boleh menggunakan nama lama.",
	"username_sekarang" => "Inputan :attribute tidak cocok.",
	"password_sekarang" => "Inputan :attribute tidak cocok.",
	"sql" => "Inputan :attribute harus berupa file sql.",

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

	'custom' => array(),

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => array(),

);
