<?php
namespace Magetop\Helloworld\Controller\Get;
 
use Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;
use Magetop\Helloworld\Model\ResourceModel\Posts\CollectionFactory;
 
class Data extends Action
{
    protected $PageFactory;
    protected $PostsFactory;
 
    public function __construct(Context $context, PageFactory $pageFactory, CollectionFactory $postsFactory)
    {
        parent::__construct($context);
        $this->PageFactory = $pageFactory;
        $this->PostsFactory = $postsFactory;
    }
 
    public function execute()
    {
        echo "Lấy dữ liệu từ bảng magetop_hello";
        $this->PostsFactory->create();
        $collection = $this->PostsFactory->create()
            ->addFieldToSelect(array('title','description','image','status','create_at','update_at'))
            ->addFieldToFilter('status',1)
            ->setPageSize(10);
        echo '<pre>';
        print_r($collection->getData());
        echo '<pre>';
    }
}