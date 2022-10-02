import { CollectionConfig } from 'payload/types';

export const CustomPosts: CollectionConfig = {
  slug: 'custom-posts',
  admin: {
    useAsTitle: 'title',
  },
  access: {
    read: () => true,
  },
  fields: [
    {
      name: 'title',
      type: 'text',
      required: true,
    }
  ],
}