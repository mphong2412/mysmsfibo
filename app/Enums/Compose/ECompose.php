<?php
namespace App\Enums\Compose;

abstract class ECompose {
	const SEND = 1;
  const SAVE = 2;

	public static function getComposeString($status) {
		switch ($status) {
			case EStatusCompose::SEND:
				return 'Đã gửi';
			case EStatusCompose::SAVE:
				return 'Đã lưu';
		}
		return null;
	}
}
