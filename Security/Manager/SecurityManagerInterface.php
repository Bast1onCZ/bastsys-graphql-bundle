<?php
declare(strict_types=1);

namespace Youshido\GraphQLBundle\Security\Manager;

use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Parser\Ast\Query;

/**
 * Date: 29.08.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */
interface SecurityManagerInterface
{

    const RESOLVE_ROOT_OPERATION_ATTRIBUTE = 'bastsys.graphql_bundle.resolve.root_operation';
    const RESOLVE_FIELD_ATTRIBUTE          = 'bastsys.graphql_bundle.resolve.field_attribute';

    /**
     * @param $attribute string
     *
     * @return bool
     */
    public function isSecurityEnabledFor($attribute);

    /**
     * @param ResolveInfo $resolveInfo
     *
     * @return bool
     */
    public function isGrantedToFieldResolve(ResolveInfo $resolveInfo);

    /**
     * @param Query $query
     *
     * @return bool
     */
    public function isGrantedToOperationResolve(Query $query);

    /**
     * @param ResolveInfo $resolveInfo
     *
     * @return mixed
     *
     * @throw \Exception
     */
    public function createNewFieldAccessDeniedException(ResolveInfo $resolveInfo);

    /**
     * @param Query $query
     *
     * @return mixed
     *
     * @throw \Exception
     */
    public function createNewOperationAccessDeniedException(Query $query);
}
