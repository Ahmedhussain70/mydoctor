<?php 
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Pagination\AbstractPaginator;

function success(string $message = 'success', int $statusCode = 200, mixed $data = []): JsonResponse
{
    return _buildResponse($statusCode, $message, $data);
}

function error(string $message = 'error', int $statusCode = 400): JsonResponse
{
    return _buildResponse($statusCode, $message);
}

function validationError($errors, string $context = '', int $statusCode = 400): JsonResponse
{
    $message = $context
        ? __("local_context.context_invalid", [
            'context' => __("local_context.context.$context")
        ])
        : __("local_context.data_invalid");

    return _buildResponse($statusCode, $message, null, $errors);
}

function _buildResponse(int $statusCode, string $message, mixed $data = null, $errors = null): JsonResponse
{
    $response = [
        'status' => $statusCode,
        'message' => _customTranslate($message),
    ];

    if (_isPaginatedResource($data)) {
        $response['data'] = $data->collection;
        $response['meta'] = _formatPaginationMeta($data->resource);
    } elseif (!is_null($data)) {
        $response['data'] = $data;
    }

    if (!is_null($errors)) {
        $response['errors'] = $errors;
    }


    return response()->json($response, $statusCode)
                ->header('Content-Language', app()->getLocale());
}

function _isPaginatedResource(mixed $data): bool
{
    return $data instanceof AnonymousResourceCollection
        && $data->resource instanceof AbstractPaginator;
}

function _formatPaginationMeta(AbstractPaginator $paginator): array
{
    return [
        'current_page'    => $paginator->currentPage(),
        'next_page_url'   => $paginator->nextPageUrl(),
        'prev_page_url'   => $paginator->previousPageUrl(),
        'prev_page_number'=> $paginator->currentPage() > 1 ? $paginator->currentPage() - 1 : null,
        'from_record'            => $paginator->firstItem(),
        'to_record'              => $paginator->lastItem(),
        'last_page'       => $paginator->lastPage(),
        'per_page'        => $paginator->perPage(),
        'total_records'           => $paginator->total(),
    ];
}

function _customTranslate(string $key): string
{
    $translated = __("local_attributes.{$key}");
    return $translated === "local_attributes.{$key}" ? $key : $translated;
}

