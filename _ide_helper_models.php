<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * Class Choice
 *
 * @property int $id
 * @property int $questionId
 * @property string|null $name
 * @property bool $hasImage
 * @property string|null $imageUrl
 * @property bool $isRight
 * @property int $sort
 * @property bool $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property Question $question
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|Choice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Choice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Choice onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Choice query()
 * @method static \Illuminate\Database\Eloquent\Builder|Choice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Choice whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Choice whereHasImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Choice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Choice whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Choice whereIsRight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Choice whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Choice whereQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Choice whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Choice whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Choice whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Choice withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Choice withoutTrashed()
 */
	class Choice extends \Eloquent {}
}

namespace App\Models{
/**
 * Class FailedJob
 *
 * @property int $id
 * @property string $uuid
 * @property string $connection
 * @property string $queue
 * @property string $payload
 * @property string $exception
 * @property Carbon $failed_at
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|FailedJob newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FailedJob newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FailedJob query()
 * @method static \Illuminate\Database\Eloquent\Builder|FailedJob whereConnection($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FailedJob whereException($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FailedJob whereFailedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FailedJob whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FailedJob wherePayload($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FailedJob whereQueue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FailedJob whereUuid($value)
 */
	class FailedJob extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Lesson
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string|null $videoUrl
 * @property int $passScore
 * @property int $sort
 * @property bool $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property Collection|Question[] $questions
 * @package App\Models
 * @property-read int|null $questions_count
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson query()
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson wherePassScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereVideoUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson withoutTrashed()
 */
	class Lesson extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Member
 *
 * @property int $id
 * @property string $name
 * @property string|null $company
 * @property string|null $department
 * @property string|null $position
 * @property string|null $businessType
 * @property string|null $email
 * @property string $password
 * @property string $rawPassword
 * @property bool $notified
 * @property bool $passed
 * @property Carbon $registerDate
 * @property Carbon|null $firstLoginDate
 * @property Carbon|null $lastVisitDate
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|Member newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Member newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Member onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Member query()
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereBusinessType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereDepartment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereFirstLoginDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereLastVisitDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereNotified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member wherePassed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereRawPassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereRegisterDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Member withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Member withoutTrashed()
 */
	class Member extends \Eloquent {}
}

namespace App\Models{
/**
 * Class MemberImportLog
 *
 * @property int $id
 * @property string $fileUrl
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|MemberImportLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MemberImportLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MemberImportLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|MemberImportLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberImportLog whereFileUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberImportLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberImportLog whereUpdatedAt($value)
 */
	class MemberImportLog extends \Eloquent {}
}

namespace App\Models{
/**
 * Class ModelHasPermission
 *
 * @property int $permission_id
 * @property string $model_type
 * @property int $model_id
 * @property Permission $permission
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasPermission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasPermission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasPermission query()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasPermission whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasPermission whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasPermission wherePermissionId($value)
 */
	class ModelHasPermission extends \Eloquent {}
}

namespace App\Models{
/**
 * Class ModelHasRole
 *
 * @property int $role_id
 * @property string $model_type
 * @property int $model_id
 * @property Role $role
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRole newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRole newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRole query()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRole whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRole whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRole whereRoleId($value)
 */
	class ModelHasRole extends \Eloquent {}
}

namespace App\Models{
/**
 * Class PasswordReset
 *
 * @property string $email
 * @property string $token
 * @property Carbon|null $created_at
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset query()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset whereToken($value)
 */
	class PasswordReset extends \Eloquent {}
}

namespace App\Models{
/**
 * Class PasswordResetToken
 *
 * @property string $email
 * @property string $token
 * @property Carbon|null $created_at
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordResetToken newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordResetToken newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordResetToken query()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordResetToken whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordResetToken whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordResetToken whereToken($value)
 */
	class PasswordResetToken extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Permission
 *
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Collection|ModelHasPermission[] $model_has_permissions
 * @property Collection|Role[] $roles
 * @package App\Models
 * @property-read int|null $model_has_permissions_count
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission query()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereUpdatedAt($value)
 */
	class Permission extends \Eloquent {}
}

namespace App\Models{
/**
 * Class PersonalAccessToken
 *
 * @property int $id
 * @property string $tokenable_type
 * @property int $tokenable_id
 * @property string $name
 * @property string $token
 * @property string|null $abilities
 * @property Carbon|null $last_used_at
 * @property Carbon|null $expires_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken query()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken whereAbilities($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken whereExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken whereLastUsedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken whereTokenableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken whereTokenableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken whereUpdatedAt($value)
 */
	class PersonalAccessToken extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Question
 *
 * @property int $id
 * @property int $lessonId
 * @property string $name
 * @property bool $hasImage
 * @property string|null $imageUrl
 * @property int $score
 * @property int $sort
 * @property bool $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property Lesson $lesson
 * @property Collection|Choice[] $choices
 * @package App\Models
 * @property-read int|null $choices_count
 * @method static \Illuminate\Database\Eloquent\Builder|Question newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Question newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Question onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Question query()
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereHasImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereLessonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Question withoutTrashed()
 */
	class Question extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Role
 *
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Collection|ModelHasRole[] $model_has_roles
 * @property Collection|Permission[] $permissions
 * @package App\Models
 * @property-read int|null $model_has_roles_count
 * @property-read int|null $permissions_count
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * Class RoleHasPermission
 *
 * @property int $permission_id
 * @property int $role_id
 * @property Permission $permission
 * @property Role $role
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|RoleHasPermission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleHasPermission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleHasPermission query()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleHasPermission wherePermissionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleHasPermission whereRoleId($value)
 */
	class RoleHasPermission extends \Eloquent {}
}

namespace App\Models{
/**
 * Class User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

