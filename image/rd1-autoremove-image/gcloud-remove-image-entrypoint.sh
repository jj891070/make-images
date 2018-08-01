#!/bin/bash
HOME=/gcloud

last-image-remove(){
    image_dir=${1}
    hold_size=${2:-"3"}
    echo "image_dir:"$image_dir
    image_name=$(gcloud container images list-tags --sort-by 'timestamp' --limit 1 --format='get(digest)'  $image_dir)
    echo "image_name:"$image_name
    # 判斷儲存庫是否為空的image
    if [[ -z "$image_name" ]]; then
        echo $image_dir" is empty dir"
    else
        # 計算現在actually image數量有沒有像使用者限制的那麼多
        # ${num_name} = actually image size
        # ${hold_size} = restrict image
        image_size=$(gcloud container images list-tags --sort-by 'timestamp' --limit ${hold_size} --format='get(digest)'  $image_dir)
        
        num_name=0
        for name in ${image_size[@]};do
            echo "image actually size:"$name
		    num_name=$(($num_name+1))
	    done

        echo "image actually size :"$num_name",restrict image size : ${hold_size}"
        # 如果實際數量小於則顯示delete fail
        if [ $num_name -lt $hold_size ]; then
	        echo "☠ delete failed ~☠"
        else
            yes | gcloud container images delete --force-delete-tags $image_dir@$image_name
            echo "⚽ delete success!! ⚽"
        fi   
        
    fi
    
}

"$@"

