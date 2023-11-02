<?php

use Illuminate\Support\Str;

if (!function_exists('all')) {
    function all($moduleName)
    {
        $content = <<<'EOD'
        <?php

        namespace App\Modules\{moduleName}\Actions;

        class All
        {
            static $model = \App\Modules\{moduleName}\Model::class;

            public static function execute()
            {
                try {
                    // dd(request()->all());
                    $offset = request()->input('offset') ?? 10;
                    $condition = [];
                    $with = [];
                    $data = self::$model::query();
                    if (request()->has('status') && request()->input('status')) {
                        $condition['status'] = request()->input('status');
                    }

                    if (request()->has('search') && request()->input('search')) {
                        $data = $data->where('title', 'like', '%' . request()->input('search') . '%');
                    }

                    if (request()->has('get_all') && (int)request()->input('get_all') === 1) {
                        $data = $data->with($with)->where($condition)->latest()->get();
                    } else {
                        $data = $data->with($with)->where($condition)->latest()->paginate($offset);
                    }
                    return entityResponse($data);
                } catch (\Exception $e) {
                    return messageResponse($e->getMessage(), 500, 'server_error');
                }
            }
        }
        EOD;

        $content = str_replace('{moduleName}', $moduleName, $content);
        return $content;
    }
}




if (!function_exists('store')) {
    function store($moduleName)
    {
        $content = <<<'EOD'
            <?php

            namespace App\Modules\{moduleName}\Actions;

            use App\Modules\{moduleName}\Actions\Validation;
            use Illuminate\Support\Facades\Hash;

            class Store
            {
                static $model = \App\Modules\{moduleName}\Model::class;

                public static function execute(Validation $request)
                {
                    try {
                        if (self::$model::query()->create($request->validated())) {
                            return messageResponse('Item added successfully', 201);
                        }
                    } catch (\Exception $e) {
                        return messageResponse($e->getMessage(), 500, 'server_error');
                    }
                }
            }
            EOD;
        $content = str_replace('{moduleName}', $moduleName, $content);
        return $content;
    }
}

if (!function_exists('update')) {
    function update($moduleName)
    {
        $content = <<<'EOD'
            <?php

            namespace App\Modules\{moduleName}\Actions;

            use App\Modules\{moduleName}\Actions\Validation;

            class Update
            {
                static $model = \App\Modules\{moduleName}\Model::class;

                public static function execute(Validation $request,$id)
                {
                    try {
                        if (!$data = self::$model::query()->where('id', $id)->first()) {
                            return messageResponse('Data not found...', 404, 'error');
                        }
                        $data->update($request->validated());
                        return messageResponse('Item updated successfully');
                    } catch (\Exception $e) {
                        return messageResponse($e->getMessage(), 500, 'server_error');
                    }
                }
            }
            EOD;
        $content = str_replace('{moduleName}', $moduleName, $content);
        return $content;
    }
}

if (!function_exists('show')) {
    function show($moduleName)
    {
        $content = <<<'EOD'
            <?php

            namespace App\Modules\{moduleName}\Actions;

            use App\Modules\{moduleName}\Actions\Validation;
            use Illuminate\Support\Facades\Hash;

            class Show
            {
                static $model = \App\Modules\{moduleName}\Model::class;

                public static function execute($id)
                {
                    try {
                        $with = [];
                        if (!$data = self::$model::query()->with($with)->where('id', $id)->first()) {
                            return messageResponse('Data not found...', 404, 'error');
                        }
                        return entityResponse($data);
                    } catch (\Exception $e) {
                        return messageResponse($e->getMessage(), 500, 'server_error');
                    }
                }
            }
            EOD;
        $content = str_replace('{moduleName}', $moduleName, $content);
        return $content;
    }
}

if (!function_exists('delete')) {
    function delete($moduleName)
    {
        $content = <<<'EOD'
            <?php

            namespace App\Modules\{moduleName}\Actions;

            class Delete
            {
                static $model = \App\Modules\{moduleName}\Model::class;

                public static function execute($id)
                {
                    try {
                        if (!$data=self::$model::find($id)) {
                            return messageResponse('Data not found...', 404, 'error');
                        }
                        $data->delete();
                    } catch (\Exception $e) {
                        return messageResponse($e->getMessage(), 500, 'server_error');
                    }
                }
            }
            EOD;
        $content = str_replace('{moduleName}', $moduleName, $content);
        return $content;
    }
}

if (!function_exists('validation')) {
    function validation($moduleName)
    {
        $content = <<<'EOD'
            <?php

            namespace App\Modules\{moduleName}\Actions;

            use Illuminate\Contracts\Validation\Validator;
            use Illuminate\Foundation\Http\FormRequest;
            use Illuminate\Http\Exceptions\HttpResponseException;
            use Illuminate\Validation\Rule;

            class Validation extends FormRequest
            {
                /**
                 * Determine if the  is authorized to make this request.
                 */
                public function authorize(): bool
                {
                    return true;
                }
                /**
                 * validateError to make this request.
                 */
                public function validateError($data)
                {
                    $errorPayload =  $data->getMessages();
                    return response(['status' => 'validation_error', 'errors' => $errorPayload], 422);
                }

                /**
                 * Get the validation rules that apply to the request.
                 *
                 * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
                 */
                public function rules(): array
                {
                    return [
                        'title' => 'required',
                        'status' => ['sometimes', Rule::in(['active', 'inactive'])],
                    ];
                }

                protected function failedValidation(Validator $validator)
                {
                    throw new HttpResponseException($this->validateError($validator->errors()));
                    if ($this->wantsJson() || $this->ajax()) {
                        throw new HttpResponseException($this->validateError($validator->errors()));
                    }
                    parent::failedValidation($validator);
                }
            }
            EOD;
        $content = str_replace('{moduleName}', $moduleName, $content);
        return $content;
    }
}
if (!function_exists('Modules')) {
    function api($moduleName)
    {
        $content = <<<'EOD'
        @protocol = http://
        # @hostname = qbank.techparkit.org
        @hostname = 127.0.0.1:8000
        @endpoint = api/v1/{route_name}
        @url = {{protocol}}{{hostname}}/{{endpoint}}
        @token = Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5YTFjMWRmZC04MWU3LTQ1ODgtYjVhMi0xOTA1ODNiNjZhNmUiLCJqdGkiOiIyYWIxMTMzZjJkMDE3YmE0ZDNmZDk3NzI3NWJlZDY5YjUyMjk1N2M3OGFlYzIxNTA2NTQ5NTUyYTA1M2ZmNzEyMDM4NzU2N2U3ZTRkMzlkNiIsImlhdCI6MTY5NDU3NjcyOC4xOTQ4OTgsIm5iZiI6MTY5NDU3NjcyOC4xOTQ5LCJleHAiOjE3MjYxOTkxMjguMTg2ODc2LCJzdWIiOiIyIiwic2NvcGVzIjpbXX0.gJZW7MbPkwIdJw7kXhPuRK6bMkuiSTPhFXxzoXxcBzX2cT9Nj7ozj7oZXQG_9cDdKe1LIQFxr2DvapUqGMvBfenrhifvWTU0_wrNIhbBQCsS3gaWWfxuvoKkCrQwKqm7wJSB5yN2LszrdqWPgMR9EBpNiUjhXxgrZUdzskjiqG35FZzZkoHOvPxV5LP2QKtekiUv_ekQoMHxeOwOC43XXiLk9cH_XNvyRjSGibh3hZHUvtLEZ0NAfWL1eZlbge8GoQYMJxN-LO72HYCSnrG2bEmWT624iAU13U-t_cEyVDb-HFPaIXOAjOnKwNUJqfwwC1lVBvd6hNyJwODZ6iZevvwUScW3_UuoUnww46Td_A6CI7QfFywQdFolu0vDkHgQMmSmPu-QNDG8HrvSh5W1d4ve-wPaNauISsvVCVXPgdDWW9n4aKI8qAv_RCEZZYa3s9zmRdjweDxG0VeISlaPg6hLzlpO1He83onbjoPSzEWJWC7bb2nUR57zppDHgKKSBP-WW_OHH7fruavkG44_7NuNmvrTFtDclGe4E3XuqZFvno154daJpKKRPzUkbeCp6Cc3X2Qp5k-ORq1cx1NfFYmpM6ZmzFZ3bNV8IV3Cp2HgZMRKHfXWRlxiVAL73sLnSBmvn1iRswMXftl2cm9xiUMQnpJKBq_MDUilRlBTiWE
        @createdAt = {{$timestamp}}
        # @modifiedBy = {{$processEnv {moduleName}NAME}}

        #                                               #
        #------------------ Modules TESTING ----------------#
        #                                               #

        ### get all data without pagination
        ### will return:  {  }
        GET {{url}} HTTP/1.1
        content-type: application/json
        # Authorization: {{token}}

        ### get single data
        # @prompt id enter id
        GET {{url}}/{{id}} HTTP/1.1
        content-type: application/json
        # Authorization: {{token}}

        ### store data
        ### @prompt title enter title
        POST {{url}} HTTP/1.1
        content-type: application/json

        {
            "title": "Title"
        }


        ### store data canvas
        ### @prompt title enter title
        PATCH {{url}}/1 HTTP/1.1
        content-type: application/json
        # Authorization: {{token}}

        {
            "title": "Title update"
        }


        #### soft delete
        # @prompt id enter id
        POST {{url}}/soft-delete HTTP/1.1
        content-type: application/json

        {
            "id": "{{id}}"
        }

        #### permenently delete
        # @prompt id enter id
        DELETE {{url}}/{{id}} HTTP/1.1
        content-type: application/json

        {
            "id": "{{id}}"
        }

        ### restore
        # @prompt id enter id
        POST {{url}}/restore HTTP/1.1
        content-type: application/json
        # Authorization: {{token}}

        {
            "id": "{{id}}"
        }
        EOD;
        $route = Str::plural((Str::kebab($moduleName)));
        $content = str_replace('{route_name}', $route, $content);
        return $content;
    }
}
if (!function_exists('model')) {
    function model($moduleName)
    {
        $content = <<<'EOD'
            <?php

            namespace App\Modules\{moduleName};

            use Illuminate\Database\Eloquent\Model as EloquentModel;
            use Illuminate\Support\Str;

            class Model extends EloquentModel
            {
                protected $table = "{table_name}";
                protected $guarded = [];

                protected static function booted()
                {
                    static::created(function ($data) {
                        $random_no = random_int(100, 999) . $data->id . random_int(100, 999);
                        $slug = $data->title . " " . $random_no;
                        $data->slug = Str::slug($slug);
                        $data->save();
                    });
                }

                public function scopeActive($q)
                {
                    return $q->where('status', 'active');
                }
            }
            EOD;
        $content = str_replace('{moduleName}', $moduleName, $content);
        $route = Str::plural((Str::snake($moduleName)));
        $content = str_replace('{table_name}', $route, $content);
        return $content;
    }
}

if (!function_exists('migration')) {
    function migration($moduleName)
    {
        $content = <<<'EOD'
        <?php

        use Illuminate\Database\Migrations\Migration;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Support\Facades\Schema;

        return new class extends Migration
        {
            /**
             * Run the migrations.
             */
            public function up(): void
            {
                Schema::create('{table_name}', function (Blueprint $table) {
                    $table->id();
                    $table->string('title')->nullable();

                    $table->bigInteger('creator')->unsigned()->nullable();
                    $table->string('slug', 50)->nullable();
                    $table->enum('status', ['active', 'inactive'])->default('active');
                    $table->timestamps();
                });
            }

            /**
             * Reverse the migrations.
             */
            public function down(): void
            {
                Schema::dropIfExists('{table_name}');
            }
        };
        EOD;
        $tableName = Str::plural((Str::snake($moduleName)));
        $content = str_replace('{table_name}', $tableName, $content);
        return $content;
    }
}

if (!function_exists('controller')) {
    function controller($moduleName)
    {
        $content = <<<'EOD'
        <?php

        namespace App\Modules\{moduleName};

        use App\Modules\{moduleName}\Actions\All;
        use App\Modules\{moduleName}\Actions\Delete;
        use App\Modules\{moduleName}\Actions\Show;
        use App\Modules\{moduleName}\Actions\Store;
        use App\Modules\{moduleName}\Actions\Update;
        use App\Modules\{moduleName}\Actions\Validation;
        use App\Http\Controllers\Controller as ControllersController;


        class Controller extends ControllersController
        {

            public function index()
            {
                $data = All::execute();
                return $data;
            }

            public function store(Validation $request)
            {
                $data = Store::execute($request);
                return $data;
            }

            public function show($id)
            {
                $data = Show::execute($id);
                return $data;
            }

            public function update($request, $id)
            {
                $data = Update::execute(Validation $request, $id);
                return $data;
            }

            public function destroy($id)
            {
                $data = Delete::execute($id);
                return $data;
            }
        }
        EOD;
        $content = str_replace('{moduleName}', $moduleName, $content);
        return $content;
    }
}
if (!function_exists('routeContent')) {
    function routeContent($moduleName)
    {
        $content = <<<'EOD'
            <?php

            use App\Modules\{moduleName}\Controller;
            use Illuminate\Support\Facades\Route;

            Route::prefix('v1')->group(function () {
                Route::apiResource('{route_name}', Controller::class);
            });
            EOD;
        $content = str_replace('{moduleName}', $moduleName, $content);
        $route = Str::plural((Str::kebab($moduleName)));
        $content = str_replace('{route_name}', $route, $content);
        return $content;
    }
}
