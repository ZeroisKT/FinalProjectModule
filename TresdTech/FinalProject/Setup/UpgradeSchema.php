<?php
namespace TresdTech\FinalProject\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use \Magento\Framework\DB\Ddl\Table;
use \Magento\Framework\DB\Adapter\AdapterInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $installer = $setup;

        if (version_compare($context->getVersion(), '1.1.1', '<')) {
            if (!$installer->tableExists('tresdtech_finalproject_post')) {

                // Añadir columna/to add column
                // $setup->getConnection()->addColumn(
                //     $setup->getTable('table_name'),
                //     'new_field',
                //     [
                //         'type' => Table::TYPE_INTEGER,
                //         'nullable' => true,
                //         'comment' => 'Comment'
                //     ]
                // );

                $table = $installer->getConnection()
                ->newTable($installer->getTable('tresdtech_finalproject_post'))
                ->addColumn('id', Table::TYPE_INTEGER, null, ['auto_increment'=>true, 'identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true], 'ID')
                ->addColumn('fisrt_name', Table::TYPE_TEXT, 255, ['nullable' => false], 'Fisrt Name')
                ->addColumn('last_name', Table::TYPE_TEXT, 255, ['nullable' => false], 'Last Name')
                ->addColumn('email', Table::TYPE_TEXT, 255, ['nullable' => false], 'Email')
                ->addColumn('telephone', Table::TYPE_TEXT, 255, ['nullable' => false], 'Telephone')
                ->addColumn('created_at', Table::TYPE_TIMESTAMP, null, ['nullable' => false, 'default' => Table::TIMESTAMP_INIT], 'Created At')
                ->addColumn('updated_at', Table::TYPE_TIMESTAMP, null, ['nullable' => false, 'default' =>Table::TIMESTAMP_INIT_UPDATE], 'Updated At')
                ->setComment('FormData Table');

                $installer->getConnection()->createTable($table);

                $installer->getConnection()->addIndex(
                    $installer->getTable('tresdtech_finalproject_post'),
                    $setup->getIdxName(
                        $installer->getTable('tresdtech_finalproject_post'),
                        ['fisrt_name','last_name','email','telephone'],
                        AdapterInterface::INDEX_TYPE_FULLTEXT
                    ),
                    ['fisrt_name','last_name','email','telephone'],
                    AdapterInterface::INDEX_TYPE_FULLTEXT
                );

            }
        }

        $setup->endSetup();
    }

}
