<?php
namespace App\Enums\User;

abstract class EStatusUser {
	const ACTIVE = 1;
    const DEACTIVE = 0;
    const DELETED = 0;

	public static function getSatusString($status) {
		switch ($status) {
			case EStatusUser::ACTIVE:
				return 'Kích hoạt';
			case EStatusUser::DEACTIVE:
				return 'Ngừng kích hoạt';
			case EStatusUser::DELETED:
				return 'Đã xóa';
		}
		return null;
	}
}
