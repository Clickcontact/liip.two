<?php

namespace Symfony\Component\Security\Acl\Model;

/*
 * This file is part of the Symfony framework.
 *
 * (c) Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

/**
 * Provides support for creating and storing ACL instances.
 *
 * @author Johannes M. Schmitt <schmittjoh@gmail.com>
 */
interface MutableAclProviderInterface extends AclProviderInterface
{
    /**
     * Creates a new ACL for the given object identity.
     *
     * @throws AclAlreadyExistsException when there already is an ACL for the given
     *                                   object identity
     * @param ObjectIdentityInterface $oid
     * @return AclInterface
     */
    function createAcl(ObjectIdentityInterface $oid);

    /**
     * Deletes the ACL for a given object identity.
     *
     * This will automatically trigger a delete for any child ACLs. If you don't
     * want child ACLs to be deleted, you will have to set their parent ACL to null.
     *
     * @param ObjectIdentityInterface $oid
     * @return void
     */
    function deleteAcl(ObjectIdentityInterface $oid);

    /**
     * Persists any changes which were made to the ACL, or any associated
     * access control entries.
     *
     * Changes to parent ACLs are not persisted.
     *
     * @param MutableAclInterface $acl
     * @return void
     */
    function updateAcl(MutableAclInterface $acl);
}